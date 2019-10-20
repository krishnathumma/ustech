<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Team;
use App\Uploaders\ImageUploader;
use App\Uploaders\CourseImageUploader;
use Gate;
use Validator;

class TeamController extends Controller 
{
    /**
     * Show all courses
     */
    public function index()
    {
        $teams = Team::all();
        $teams = $teams->each(function ($team) {
            if ($team->logo_uri) {
                //$team->logo_uri = generateThumbnailImagePath($team->logo_uri);
                $team->logo_uri = '/img/Teams/'.$team->logo_uri;
            }
        });
        return view('teams.index', [
            'teams' => $teams
        ]);
    }

    /**
     * Show view for creating new course
     */
    public function create()
    {        
        return view('teams.create');
    }

    /**
     * Show course details and lessons
     * @param  Course $course
     */
    public function show(Course $course)
    {
        if (Gate::denies('show', $course)) {
            return parent::unauthorizedResponse(redirect()->action('CoursesController@index'));
        }

        $course->load('lessons');

        return view('courses.show', [
            'course' => $course,
            'users' => \App\User::all()
        ]);
    }

    /**
     * Create a new course
     * @param  Request $request
     */
    public function store(Request $request)
    {
        if ($request->has('save')) {
            return $this->createNewTeam($request);
        } 
        elseif ($request->has('cancel')) {
            return $this->cancelCreateNewTeam($request);
        }
    }
    

    private function createNewTeam(Request $request)
    {
        //dd(public_path('img/Teams/'));
        $rules = array(
            'team' => 'required',
            'teamlogo' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
            'state' => 'required|max:2'
            );
            $messages = array(
                'team.required' => 'Please enter Team Name.',
                'teamlogo.required' => 'Please Select Team Logo',
                'state.required' => 'Please enter Team State In 2 Letters Only.',
            );

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect('teams/create')
                                ->withErrors($validator)
                                 ->withInput();
            }

        

        $destinationPath = public_path('/img/Teams/');
        $file_name = null;
                
        // if ($request->has('teamlogo')) {
            if ($request->hasFile('teamlogo')) {

               $image = $request->file('teamlogo');
                 $file_name = time().'.'.$image->getClientOriginalExtension();
               //$file_name = $image;
                $image->move($destinationPath, $file_name);

                // $this->save();
                // return back()->with('success','Image Upload successfully');
            }
        // }

        $team = new Team;
        $team->name = $request->team;
        $team->state = $request->state;
        $team->logo_uri = $file_name;
        
        $team->save(); // save course here so that we can get an id

       // flash('Team added', 'success');

        return redirect()->route('teams.index');
    }

    private function cancelCreateNewTeam(Request $request)
    {
        // delete any temporary uploaded course image file
        if ($request->has('image')) {
            \File::delete(public_path(config('constants.upload_dir.tmp')) . basename($request->image));
        }

        return redirect()->route('teams.index');
    }

}
