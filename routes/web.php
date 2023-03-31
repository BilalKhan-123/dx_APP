<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OperationsController;


use App\Models\StudentsResultsRecords;
use App\Models\SubjectRecords;
use App\Models\QuestionsRecords;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [OperationsController::class, 'index'])->name('index');

/*Auth::routes();*/
Route::prefix('mcqs')->group(function () {


 Route::post('/process ', [OperationsController::class, 'getQuestions'])->name('mcqs.process');
 Route::any('/next ', [OperationsController::class, 'nextQuestions'])->name('mcqs.next');
 Route::any('/skip ', [OperationsController::class, 'skipQuestions'])->name('mcqs.skip');





});
