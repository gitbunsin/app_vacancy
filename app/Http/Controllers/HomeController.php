<?php
namespace App\Http\Controllers;

use App\Model\job;
use App\user;
use App\Model\userCv;
use Illuminate\Support\Facades\Auth;
use App\Model\jobAttachment;
use Illuminate\Http\Request;
use App\Model\pricing;
use App\Model\vacancy;
use App\Model\contact;
use App\Model\post;
use App\Model\JobCategory;
use Illuminate\Support\Facades\Response;
class HomeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = vacancy::with(['company','province','category','jobType','company'])->take(9)->get();
        $categories = JobCategory::orderBy('name', 'asc')->get();
        // $countCategory = vacancy::with('category')->count();
        // dd($countCategory);
        return view('frontend/pages/home',compact('job','categories'));
    }
    public function package()
    {
        $packages = Pricing::all();
        return view('frontend.pages.pricing',compact('packages'));
    }
    public function news()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('frontend.pages.blog',compact('posts'));
    }
    public function blogDetails(){

        return view('frontend/pages/blog-detail');
    }
    public function contactUsPost(Request $request)
    {
         $user_id = $request->user_id;
        if ($user_id) {
            $contact = new contact();
            $contact->user_id = $user_id;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->email   =  $request->email;
            $contact->full_name = $request->name;
            $contact->save();
            return response::json('success');
        }else{
            return response::json('error');
        }
    }
    public function report($job_id)
    {
        // dd($job_id);
        $report = vacancy::where('id',$job_id)->first();
        return view('frontend.pages.report',compact('report'));
    }
    public function register()
    {
        return view('frontend.pages.register');
    }

    public function login()
    {
        return view('frontend.pages.login');
    }

    public function about(){

        return view('frontend.pages.about');
    }
    public function contact()
    {
        return view('frontend/pages/contact');
    }
    public function createResume(){

        return view('frontend.pages.create-resume');
    }
    public function mangeCandidate(){

        return view('frontend.pages.manage-candidate');
    }
    public function profileDetails()
    {

        $user_cv = userCv::where('user_id',auth::user()->id)->first();
        $user = User::where('id',auth::user()->id)->first();
        // dd($user);
        return view('frontend.pages.user-profile',compact('user_cv','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
