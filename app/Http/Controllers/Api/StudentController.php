<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
  /**
     * @OA\Get(
     *     path="/api/students",
     *     summary="Get list of students",
     *     tags={"Students"},
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number for pagination",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Student")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
     */



class StudentController extends Controller
{

    public function index(){

        $students = Student::all();
       if($students -> count() >0 ){
        return response() -> json([
            'status'=>200,
            'message'=>$students

        ],200);
       }else{
        return response() -> json([
            'status'=>404,
            'message'=>'No Data Available in Table'
        ],404);
       }

    }

    /**
 * @OA\Post(
 *     path="/api/students",
 *     summary="Insert a new student",
 *     tags={"Students"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Student")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Student created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Student")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request"
 *     )
 * )
 */

    public function saveData(Request $request){
        $students=Student::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        if($students){
            return response()->json([
                'status'=>200,
                'message'=>'Successiffully'
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Not Successiffully'
            ],404);

        }
    }
 /**
 * @OA\Delete(
 *     path="/api/students/{id}",
 *     summary="Delete a student by ID",
 *     tags={"Students"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of student to delete",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Student deleted successfully"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Resource not found"
 *     )
 * )
 */
    public function deleteData($id){
        $students= Student::find($id);
        if($students){
            $students->delete();
            return response()->json([
                'status'=>200,
                'message'=>'delete data success'

            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Something Error'
            ],404);
        }


    }
    /**
 * @OA\Get(
 *     path="/api/students/{id}",
 *     summary="Get a student by ID",
 *     tags={"Students"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of student to return",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(ref="#/components/schemas/Student")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Resource not found"
 *     )
 * )
 */
    public function showbyId($id){
        $students = Student::find($id);
        if($students){
            return response()->json([
                'status'=>200,
                'message'=>$students
            ],200);

        }else{
            return response()->json([
                'status'=>404,
                'message'=>'No data'
            ],404);
        }

    }


/**
 * @OA\Put(
 *     path="/api/students/{id}",
 *     summary="Update a student by ID",
 *     tags={"Students"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of student to update",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Student")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Student updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Student")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request"
 *     )
 * )
 */
    public function updateStudent(Request $request,int $id){
        $students = Student::find($id);
        if($students){
            $students->update([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone'=>$request->phone

            ]);
            return response()->json([
                'status'=>200,
                'message'=>'Update Success'

            ]);

    }else{
        return response()->json([
            'status'=>404,
            'message'=>'Error in Update'
        ],404);
    }
}
}
