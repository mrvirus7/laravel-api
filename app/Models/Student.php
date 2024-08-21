<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 /**
 * @OA\Schema(
 *     schema="Student",
 *     type="object",
 *     title="Student",
 *     required={"id", "firstname", "lastname","email","phone"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the student"
 *     ),
 *     @OA\Property(
 *         property="firstname",
 *         type="string",
 *         description="First name of the student"
 *     ),
 *     @OA\Property(
 *         property="lastname",
 *         type="string",
 *         description="Last name of the student"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="Phone number of the student"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="Email address of the student"
 *     )
 * )
 */

class Student extends Model
{

    use HasFactory;
    protected $table ='students';
    protected $fillable =[
        'firstname',
        'lastname',
        'phone',
        'email'

    ];
}
