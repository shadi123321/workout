<?php

namespace App\Http\Controllers;
use App\Models\detail;
use App\Models\exercise;
use Illuminate\Http\Request;
use App\Models\gender;
use App\Models\goal;
use App\Models\program;
use App\Models\progress;
use App\Models\User;
use App\Models\user_excersice;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use League\CommonMark\Node\Query;
use Nette\Utils\Json;

class infoController extends Controller
{
    public function select_gender(Request $request)
    {
        $user_id = auth()->user()->id;

        $validator=Validator::make($request->all(),
        [
            'gender_id' => 'required|numeric|in:2,3',
        ]);
    if ( $validator->fails())
    {
        return response()->json(['status'=>422,'message'=>'error','errors'=>$validator->messages()],422);
        
    }
    else{
       $post=User::findorFail( $user_id);
           $post->gender_id=$request->gender_id;
           $post->save();
           return   response()->json(['status'=>200,'message'=>'the gender is',],200);

    }
    }
    public function select_goal(Request $request)
    {
        $user_id = auth()->user()->id;

        $validator=Validator::make($request->all(),
        [
            'goal_id' => 'required|numeric|in:2,3,4',
        ]);
    if ( $validator->fails())
    {
        return response()->json(['status'=>422,'message'=>'error','errors'=>$validator->messages()],422);
        
    }
    else{
       $post=User::findorFail( $user_id);
           $post->goal_id=$request->goal_id;
           $post->save();
           return 'this  goal selection is done';
    }
    }
public function relation ()
{
    $v =gender::find(1)->user;
     return $v;
     
}
public function relation2 ()
{
    $y =goal::find(4)->user;
     return $y;
}
public function details(Request $request)
{
$validator=Validator::make($request->all(),
    [
        'tall' => 'required|numeric|min:1.55|max:2.10',
        'weight' => 'required|numeric|min:50.0|max:120.0',
        'age' => 'required|numeric|min:15|max:55',
    ]);
if ( $validator->fails())
{
    return response()->json(['status'=>422,'errors'=>$validator->messages()],422);
}
$user=detail::create([
'user_id'=>auth()->user()->id,
'tall'=>$request->tall,
'weight'=> $request->weight,
'age'=> $request->age,
'BMI'=> ($request->weight / ($request->tall * $request->tall)),

]);
return $user;
}
public function getinfo ()
{
    $y =detail::find(1)->user->gender_id;
    $hisgender=gender::find($y)->type ;
    $hisgoal =goal::find($y)->type;
    $hisgender.$hisgoal;
return response(['message'=>'out successfully' ],200);
}
public function defaultexersice() {
    
    $user_id = auth()->user();
    $favorites = DB::table('exercises') ->where('gender_id', $user_id->gender_id)->where('goal_id', $user_id->goal_id)->get();
    foreach ($favorites as $s) {
        //put the condition
        DB::table('programs')->insert([
            "user_id" => $user_id->id,
            "exercise_id" => $s->id,
        ]);
    }
   return 'done';

}
public function getDefault()
{
$user_id = auth()->user()->id;
// Get the user with exercises relationship 
//we use the function ($query) to apply the condition in data which come with relationship
$userWithFilteredExercises = User::with(['exercises' => function ($query) {
    $query->where('level_id',3);
}])->find($user_id);
if (!$userWithFilteredExercises) {
    return response()->json(['error' => 'User not found'], 404);
}
$exercises = $userWithFilteredExercises->exercises;
// Return specific attributes from the exercises collection
$extractedAttributes = $exercises->map(function ($exercise) {
    return [ 'name' => $exercise->name,  'exercise_id' => $exercise->id, ];
});
return response()->json(['status' => 'success', 'data' => $extractedAttributes], 200);
}
//     // Get the user with exercises relationship 
//     //we use the function ($query) to apply the condition in data which come with relationship
//     $userWithFilteredExercises = User::with(['exercises' => function ($query) {
//         $query->where('level_id', 2); // Filtering exercises
//     }])->find($user_id);

//     if (!$userWithFilteredExercises) {
//         return response()->json(['error' => 'User not found'], 404);
//     }

//     // Extract the exercises collection
//     $result = $userWithFilteredExercises->exercises;
//     return response()->json(['status' => 'success',  'data' => $result], 200);

public function getcalories($exercise_id)
{
    $user_id = auth()->user()->id;

    $condition=program::where('exercise_id', $exercise_id)->where('user_id', $user_id)->first();
    if(!isset($condition))
    {
        return response()->json(['status'=>422,'message'=>'invalid exercise id',],422);
    }
    else
 $id=$condition->exercise_id;
$burnedcalories=exercise::find($id)->gender_id;
DB::table('progress')->insert([
    'user_id' => $user_id,
    'burned_calories' => $burnedcalories
]);
 return response()->json([ "status" => 1, 'data' => $burnedcalories,], 200);

}
public function date(){
    $v2=progress::where('id',1)->first();
    return $v2->created_at->format('d m y');
}
// public function testRelation()
// {
//     $V=progress::find(1)->userRelation;
//     return $V;
// }
}


