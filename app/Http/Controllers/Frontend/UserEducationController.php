<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\userEducation;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Model\Country;
use App\Model\City;
use App\User;
use Exception;
use App\Model\Language;
class UserEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    function aboutMeEdit($id)
    {
        $user = User::find($id);
        return response::json($user);
    }
    function aboutMeUpdate(Request $request , $id)
    {
        $user = User::find($id);
        $user->about_me = $request->about_me;
        $user->save();
        return response::json($user); 
    }
    public function generateDocx($user_id){
        $user = User::with(['hobby','reference','skill','language','traning','experience','education'])->where('id',$user_id)->first();
        // dd($user);
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
     

        
        $section->addImage("images/new-logo.png");


        // Adding Text element with font customized using explicitly created font style object...
        $headers_style = new \PhpOffice\PhpWord\Style\Font();
        // $headers_style->setBold(true);
        $headers_style->setName('Varela Round');
        $headers_style->setSize(12);


        $phpWord->setDefaultParagraphStyle(
            array(
            //'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT,
            'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),
            'spacing' => 120,
            'lineHeight' => 1,
            )
            );
        //
        // $experience_style = new \PhpOffice\PhpWord\Style\Font();
        // // $headers_style->setBold(true);
        // $experience_style->setName('Varela Round');
        // $experience_style->setSize(11);

        //Description Style
        $desc_style = new \PhpOffice\PhpWord\Style\Font();
        // $desc_style->setBold(true);
        $desc_style->setName('Varela Round');
        $desc_style->setSize(10);


        
      
        // $aboutMe->setFontStyle($desc_style);
      
        //List User info 
        $YourPersonInfo = $section->addText("Personal Info"
        ,array('size' => 15 , 'name'=>"Varela Round"),
         array('space' => array('before' => 200, 'after' => 200))
        );
        // $YourPersonInfo->setFontStyle($headers_style);
        // $YourPersonInfo->SetspaceBefore($YourPersonInfo);

        $name = $section->addText("Full Name: " . $user->name,array('size' => 11 , 'name'=>"Varela Round")
        ,array('space' => array('before'=>90 , 'after' => 100),
        'indentation' => array('left' => 200, 'right' => 100),
        )  
        );
        $lastName = $section->addText("Last Name: " . $user->last_name,array('size' => 11 , 'name'=>"Varela Round")
        ,array('space' => array('before'=>90 , 'after' => 100),
        'indentation' => array('left' => 200, 'right' => 100)
        )  
        );
        $firstName = $section->addText("First Name: " . $user->first_name,array('size' => 11 , 'name'=>"Varela Round"),
        array('space' => array('before'=>90 , 'after' => 100),
        'indentation' => array('left' => 200, 'right' => 100)
        )      
        );
        $YourInfo = $section->addText("Date of Birth: " . "26/01/1982",array('size' => 11 , 'name'=>"Varela Round")
        ,array('space' => array('before'=>90 , 'after' => 100),
        'indentation' => array('left' => 200, 'right' => 100)
        )  
        );
        $birthPlace = $section->addText("Birth Place: " . "United State of America",array('size' => 11 , 'name'=>"Varela Round")
        ,array('space' => array('before'=>90 , 'after' => 100),
        'indentation' => array('left' => 200, 'right' => 100)
        
        )  
        );
        $Nationality = $section->addText("Nationality: " . "Canadian",array('size' => 11 , 'name'=>"Varela Round"),
        array('space' => array('before'=>90 , 'after' => 100),
        'indentation' => array('left' => 200, 'right' => 100)
        )      
         );
        $Sex = $section->addText("Sex: " . "Male",array('size' => 11 , 'name'=>"Varela Round")
        ,array('space' => array('before'=>90 , 'after' => 100),
        'indentation' => array('left' => 200, 'right' => 100)
        )    
        );
        $Address = $section->addText("Address: " . "Phnom Penh Cambodia"
        ,array('size' => 11 , 'name'=>"Varela Round")
        ,array('space' => array('after' => 200),
        'indentation' => array('left' => 200, 'right' => 100))
        );

        $YourPersonInfo = $section->addText("About Me"
        ,array('size' => 15 , 'name'=>"Varela Round"),
         array('space' => array('before' => 200, 'after' => 200))
        );
        
        $description = $section->addText($user->about_me
            ,array('size' => 10 , 'name'=>"Varela Round")
            ,array('space' => array('before' => 360, 'after' => 480),
            'indentation' => array('left' => 200, 'right' => 100)
            )
        );

        $YourPersonInfo = $section->addText("Education"
        ,array('size' => 15 , 'name'=>"Varela Round"),
         array('space' => array('before' => 200, 'after' => 200))
        );
        
        // $YourEducation->setFontStyle($headers_style,array('color'=>'#a83236')
        // );


        foreach ($user->education as $key => $educations) {
            $desc = $section->addText($educations->year . ' - ' . $educations->year_to . ": " . $educations->school
            ,array('size' => 12 , 'name'=>"Varela Round")
        );
            $description = $section->addText(
                htmlspecialchars(
                    "Descriptive writing calls for close attention to factual and sensory details: show, don't tell. Whether your subject is as small as a strawberry or as large as a fruit farm, you should begin by observing your subject closely. Examine it with all five senses, and write down any details and descriptions that come to mind"
                )
                ,array('size' => 10 , 'name'=>"Varela Round")
                ,array('space' => array('before' => 360, 'after' => 480),
                'indentation' => array('left' => 200, 'right' => 100)
                )
            );
        }


        
        $YourEducation = $section->addText("Experience"
        ,array('size' => 15 , 'name'=>"Varela Round")
        );
        // $YourEducation->setFontStyle($headers_style);
        foreach ($user->experience as $key => $experiences) {
            $desc = $section->addText($experiences->year . ' - ' . $experiences->year_to . ": " . $experiences->company_name
            ,array('size' => 10 , 'name'=>"Varela Round")
            ,array('space' => array('before' => 360, 'after' => 480),
            'indentation' => array('left' => 200, 'right' => 100)
            )
        );
            // $desc->setFontStyle($desc_style);
        }


        $YourEducation = $section->addText("training"
        ,array('size' => 15 , 'name'=>"Varela Round")
        );
        // $YourEducation->setFontStyle($headers_style);
        foreach ($user->traning as $key => $tranings) {
            $desc = $section->addText($tranings->year . ' - ' . $tranings->year_to . ": " . $tranings->degree
            ,array('size' => 10 , 'name'=>"Varela Round")
            ,array('space' => array('before' => 360, 'after' => 480),
            'indentation' => array('left' => 200, 'right' => 100))
        );
            // $desc->setFontStyle($desc_style);
        }


        $YourEducation = $section->addText("skill"
        ,array('size' => 15 , 'name'=>"Varela Round")
        );
        // $YourEducation->setFontStyle($headers_style);
        foreach ($user->skill as $key => $skill) {
            $desc = $section->addText($skill->year . ' - ' . $skill->name
            ,array('size' => 10 , 'name'=>"Varela Round")
            ,array('space' => array('before' => 360, 'after' => 480),
            'indentation' => array('left' => 200, 'right' => 100))
        );
            // $desc->setFontStyle($desc_style);
        }

        $YourEducation = $section->addText("language"
         ,array('size' => 15 , 'name'=>"Varela Round")
        );
        // $YourEducation->setFontStyle($headers_style);
        foreach ($user->language as $key => $languages) {
            $lang = language::where('id',$languages->language_id)->first();
            $desc = $section->addText("Name: " .$lang->name . "  " . $languages->level 
            ,array('size' => 10 , 'name'=>"Varela Round")
            ,array('space' => array('before' => 360, 'after' => 480),
            'indentation' => array('left' => 200, 'right' => 100))    
        );
            // $desc->setFontStyle($desc_style);
        }

        $YourEducation = $section->addText("Reference"
        ,array('size' => 15 , 'name'=>"Varela Round")
       );
        // $YourEducation->setFontStyle($headers_style);
        foreach ($user->reference as $key => $references) {
            $desc = $section->addText("Name: ".' '. $references->name 
            ,array('size' => 10 , 'name'=>"Varela Round")
            ,array('space' => array('before' => 200, 'after' => 200),
            'indentation' => array('left' => 200, 'right' => 100)
            )
        );
            $section->addText("Email:".' '.$references->email
              ,array('size' => 10 , 'name'=>"Varela Round")
              ,array('space' => array('before' => 200, 'after' => 200),
            'indentation' => array('left' => 200, 'right' => 100)
            )
            );

            $section->addText("Position:".' '. $references->position
            ,array('size' => 10 , 'name'=>"Varela Round")
            ,array('space' => array('before' => 200, 'after' => 200),
            'indentation' => array('left' => 200, 'right' => 100)
            )
            );

            $section->addText("Phone:".' '.$references->phone
            ,array('size' => 10 , 'name'=>"Varela Round")
            ,array('space' => array('before' => 200, 'after' => 200),
            'indentation' => array('left' => 200, 'right' => 100)
            )
            );
            
            $section->addTextBreak(1);
            // $desc->setFontStyle($desc_style);
        }


        $YourHobbies = $section->addText("Hobby"
        ,array('size' => 15 , 'name'=>"Varela Round")
        );
        $YourHobbies->setFontStyle($headers_style);
        foreach ($user->hobby as $key => $hobbies) {
            $desc = $section->addText("Name:" .$hobbies->name
            ,array('size' => 10 , 'name'=>"Varela Round")
            ,array('space' => array('before' => 360, 'after' => 480),
            'indentation' => array('left' => 200, 'right' => 100))
            );
            // $desc->setFontStyle($desc_style);
        }
       

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path($user->name.'.docx'));
        } catch (Exception $e) {
        }
        return response()->download(storage_path($user->name.'.docx'));
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
        $education = new userEducation();
        $education->user_id = Auth::user()->id;
        $education->school  = $request->school;
        $education->study = $request->study;
        $education->degree = $request->degree;
        $education->country_id  = $request->country;
        $education->city_id = $request->city;
        $education->year = $request->year;
        $education->year_to = $request->year_to;
        $education->save();
        return response::json($education);
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
        $education =  userEducation::find($id);
        $education['all_country'] = Country::all();
        $education['all_city'] = City::all();
        return response::json($education);
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
        $education =  userEducation::find($id);
        $education->user_id = Auth::user()->id;
        $education->school  = $request->school;
        $education->study = $request->study;
        $education->degree = $request->degree;
        $education->country_id  = $request->country;
        $education->city_id = $request->city;
        $education->year = $request->year;
        $education->year_to = $request->year_to;
        $education->save();
        return response::json($education);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education =  userEducation::find($id);
        $education->delete();
        return response::json($education);
    }
}
