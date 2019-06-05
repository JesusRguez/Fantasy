<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Fantasy;
use App\Models\ActivePoint;
use Validator;
use File;

class QuizController extends Controller
{

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }


  public function storeAjaxFantasy(Request $request)
  {

    $id_fantasy = Fantasy::where('token', $request->fantasy_token)->first()->id;

    /*If a quiz already exists, we delete it so all its questions
    are also deleted (by cascade), then create a new one*/
    if( Quiz::where('id_fantasy', $id_fantasy)->exists()) {

      $quiz = Quiz::where('id_fantasy', $id_fantasy)->first();

      // First, delete all images from all its questions, if they exist
      $images_to_delete = Question::where('id_quiz', $quiz->id)->pluck('image')->toArray();
      foreach($images_to_delete as $image_to_delete)
      if($image_to_delete)
      if(File::exists($image_to_delete))
      unlink($image_to_delete);


      $quiz->delete();
    }

    $quiz = new Quiz();
    $quiz->id_fantasy = $id_fantasy;
    $quiz->id_activepoint = null;
    $quiz->save();

    $questions_json = json_decode($request->questions,true);


    //$images = $request->images;
    $dir = 'uploads/quizes/images/'; // Where are the images saved
    $i = 0; //index for the image array

    foreach($questions_json as $question_array) {

      $score = 30 / count($questions_json); //The final quiz's score is always 30% of the fantasy's total, divided between all questions
      
      $question = new Question();
      $question->questiontext = $question_array['question_text'];
      $question->type = $question_array['type'];
      $question->score = $score;
      $question->id_quiz = $quiz->id;

      if($request->hasFile('image' . $i)){ // If this question has an image, save it in the filesystem and assign it

        $filename = ($request->fantasy_token . 'question' . $i);
        $request->file('image' . $i)->move($dir, $filename);

        $question->image = ($dir . $filename);
      }
      else
      $question->image = null;

      $i++;

      $question->save();

      if ($question_array['type'] === "0") { // simple answer question

        $answerCorrect = new Answer();
        $answerCorrect->answertext = $question_array['answer_correct'];
        $answerCorrect->status = true;
        $answerCorrect->token_pa = null;
        $answerCorrect->id_question = $question->id;
        $answerCorrect->save();

        $answerIncorrect0 = new Answer();
        $answerIncorrect0->answertext = $question_array['answer_incorrect0'];
        $answerIncorrect0->status = false;
        $answerIncorrect0->token_pa = null;
        $answerIncorrect0->id_question = $question->id;
        $answerIncorrect0->save();

        $answerIncorrect1 = new Answer();
        $answerIncorrect1->answertext = $question_array['answer_incorrect1'];
        $answerIncorrect1->status = false;
        $answerIncorrect1->token_pa = null;
        $answerIncorrect1->id_question = $question->id;
        $answerIncorrect1->save();

        $answerIncorrect2 = new Answer();
        $answerIncorrect2->answertext = $question_array['answer_incorrect2'];
        $answerIncorrect2->status = false;
        $answerIncorrect2->token_pa = null;
        $answerIncorrect2->id_question = $question->id;
        $answerIncorrect2->save();

      } else if ($question_array['type'] === "1") { // multi answer question

        $answer0 = new Answer();
        $answer0->answertext = $question_array['answer0'];
        $answer0->status = $question_array['answer0_check'];
        $answer0->token_pa = null;
        $answer0->id_question = $question->id;
        $answer0->save();

        $answer1 = new Answer();
        $answer1->answertext = $question_array['answer1'];
        $answer1->status = $question_array['answer1_check'];
        $answer1->token_pa = null;
        $answer1->id_question = $question->id;
        $answer1->save();

        $answer2 = new Answer();
        $answer2->answertext = $question_array['answer2'];
        $answer2->status = $question_array['answer2_check'];
        $answer2->token_pa = null;
        $answer2->id_question = $question->id;
        $answer2->save();

        $answer3 = new Answer();
        $answer3->answertext = $question_array['answer3'];
        $answer3->status = $question_array['answer3_check'];
        $answer3->token_pa = null;
        $answer3->id_question = $question->id;
        $answer3->save();

      } else if ($question_array['type'] === "2") { // gap answer question

        $answer = new Answer();
        $answer->answertext = $question_array['gapword'];
        $answer->status = true;
        $answer->token_pa = null;
        $answer->id_question = $question->id;
        $answer->save();

      } else { // essay question

        // nothing to do with essay questions currently

      }
    }
  }



  public function storeAjaxAP(Request $request)
  {

    $id_activepoint = ActivePoint::where('token', $request->ap_token)->first()->id;

    /*If a quiz already exists, we delete it so all its questions
    are also deleted (by cascade), then create a new one*/
    if( Quiz::where('id_activepoint', $id_activepoint)->exists()) {
      $quiz = Quiz::where('id_activepoint', $id_activepoint)->first();
      $quiz->delete();
    }

    $quiz = new Quiz();
    $quiz->id_activepoint = $id_activepoint;
    $quiz->id_fantasy = null;
    $quiz->save();

    $questions_json = json_decode($request->questions,true);

    foreach($questions_json as $question_array) {


      $question = new Question();
      $question->questiontext = $question_array['question_text'];
      $question->image = null; // AP questions cannot have images
      $question->type = $question_array['type'];
      $question->score = $question_array['score'];
      $question->id_quiz = $quiz->id;
      $question->save();

      if ($question_array['type'] === "0") { // simple answer question

        $answerCorrect = new Answer();
        $answerCorrect->answertext = $question_array['answer_correct'];
        $answerCorrect->status = true;
        $answerCorrect->token_pa = $request->ap_token;
        $answerCorrect->id_question = $question->id;
        $answerCorrect->save();

        $answerIncorrect0 = new Answer();
        $answerIncorrect0->answertext = $question_array['answer_incorrect0'];
        $answerIncorrect0->status = false;
        $answerIncorrect0->token_pa = $request->ap_token;
        $answerIncorrect0->id_question = $question->id;
        $answerIncorrect0->save();

        $answerIncorrect1 = new Answer();
        $answerIncorrect1->answertext = $question_array['answer_incorrect1'];
        $answerIncorrect1->status = false;
        $answerIncorrect1->token_pa = $request->ap_token;
        $answerIncorrect1->id_question = $question->id;
        $answerIncorrect1->save();

        $answerIncorrect2 = new Answer();
        $answerIncorrect2->answertext = $question_array['answer_incorrect2'];
        $answerIncorrect2->status = false;
        $answerIncorrect2->token_pa = $request->ap_token;
        $answerIncorrect2->id_question = $question->id;
        $answerIncorrect2->save();

      } else if ($question_array['type'] === "1") { // multi answer question

        $answer0 = new Answer();
        $answer0->answertext = $question_array['answer0'];
        $answer0->status = $question_array['answer0_check'];
        $answer0->token_pa = $request->ap_token;
        $answer0->id_question = $question->id;
        $answer0->save();

        $answer1 = new Answer();
        $answer1->answertext = $question_array['answer1'];
        $answer1->status = $question_array['answer1_check'];
        $answer1->token_pa = $request->ap_token;
        $answer1->id_question = $question->id;
        $answer1->save();

        $answer2 = new Answer();
        $answer2->answertext = $question_array['answer2'];
        $answer2->status = $question_array['answer2_check'];
        $answer2->token_pa = $request->ap_token;
        $answer2->id_question = $question->id;
        $answer2->save();

        $answer3 = new Answer();
        $answer3->answertext = $question_array['answer3'];
        $answer3->status = $question_array['answer3_check'];
        $answer3->token_pa = $request->ap_token;
        $answer3->id_question = $question->id;
        $answer3->save();

      } else if ($question_array['type'] === "2") { // gap answer question

        $answer = new Answer();
        $answer->answertext = $question_array['gapword'];
        $answer->status = true;
        $answer->token_pa = $request->ap_token;
        $answer->id_question = $question->id;
        $answer->save();

      } else { // essay question

        // activepoints cannot have essay questions

      }
    }
  }

  // Used to fill the Fantasy modal when opened with data relevant to the all the quiz fields
  public function modalFantasyAjax(Request $request) {

    if(Fantasy::where('token', $request->fantasy_token)->exists()) {

      $id_fantasy = Fantasy::where('token', $request->fantasy_token)->first()->id;

      if(Quiz::where('id_fantasy', $id_fantasy)->exists()) {

        $id_quiz = Quiz::where('id_fantasy', $id_fantasy)->first()->id;

        if(Question::where('id_quiz', $id_quiz)->exists()) {

          $questions = Question::where('id_quiz', $id_quiz)->get(['id','questiontext','type']);
          $i = 0; //Counter for the question array

          foreach($questions as $question) {

            $question_data = [];

            $question_data['questiontext'] = $question->questiontext;
            $question_data['type'] = $question->type;

            if(Answer::where('id_question', $question->id)->exists()) {

              $answers = Answer::where('id_question', $question->id)->get(['answertext','status']);
              $j = 0; // Counter for the answer array

              foreach($answers as $answer) {
                $question_data['answer' . $j] = $answer->answertext;
                $question_data['answer' . $j . '_correct'] = $answer->status;
                $j++;
              }
            }

            $response[$i] = $question_data;
            $i++;
          }


          return json_encode($response);
        }
      }
    }
  }

  // Used to fill the AP modal when opened with data relevant to the all the quiz fields
  public function modalAPAjax(Request $request) {

    if(ActivePoint::where('token', $request->ap_token)->exists()) {

      $id_activepoint = ActivePoint::where('token', $request->ap_token)->first()->id;

      if(Quiz::where('id_activepoint', $id_activepoint)->exists()) {

        $id_quiz = Quiz::where('id_activepoint', $id_activepoint)->first()->id;

        if(Question::where('id_quiz', $id_quiz)->exists()) {

          $questions = Question::where('id_quiz', $id_quiz)->get(['id','questiontext','type','score']);
          $i = 0; //Counter for the question array

          foreach($questions as $question) {

            $question_data = [];

            $question_data['questiontext'] = $question->questiontext;
            $question_data['type'] = $question->type;
            $question_data['score'] = $question->score;

            if(Answer::where('id_question', $question->id)->exists()) {

              $answers = Answer::where('id_question', $question->id)->get(['answertext','status']);
              $j = 0; // Counter for the answer array

              foreach($answers as $answer) {
                $question_data['answer' . $j] = $answer->answertext;
                $question_data['answer' . $j . '_correct'] = $answer->status;
                $j++;
              }
            }

            $response[$i] = $question_data;
            $i++;
          }


          return json_encode($response);
        }
      }
    }
  }



	public function show($id_fantasy)
	{
			//Fantasy Quiz
			$activepoints = ActivePoint::where('id_fantasy', $id_fantasy)->get(['id']);
      
      $quiz = array();
      $question_Fantasy = array();
      $answer_Fantasy = array();
      if(Quiz::where('id_fantasy', $id_fantasy)->exists())
      { 
        $quiz = Quiz::where('id_fantasy', $id_fantasy)->get(['id']);  
        $question_Fantasy = Question::where('id_quiz', $quiz->id )->get(['id, questiontext']);
        $answer_Fantasy = Answer::where('id_question', $question_Fantasy->id)->get(['id', 'answertext']);
      }
      
      //Active Points Quiz
      $quizzes_ActivePoint[] = array();
      foreach( $activepoints as $activepoint){
        if(Quiz::where('id_fantasy', $id_fantasy)->exists())
        { 
          $quiz_PA = Quiz::where('id_activepoint', $activepoint->id)->get(['id']);
          echo 'EL QUIZZ:'.$quizPA;
          echo("<br>-------------<br>");
          $COUNT = array_push($quizzes_ActivePoint, '1');
          echo json_encode($quizzes_ActivePoint);
          echo 'id active point: '.$activepoint->id.'<br>';
          sleep(6);
        }
			}

      $questions_ActivePoint[] = array();
      echo json_encode($quizzes_ActivePoint);
      //var_dump($quizzes_ActivePoint);
      sleep(5);
      $quizzes_ActivePoint = array_filter($quizzes_ActivePoint);
      //print_r($quizzes_ActivePoint);
      //sleep(10);
			foreach( $quizzes_ActivePoint as $quiz_ActivePoint){	
        if( Question::where('id_quiz', $quiz_ActivePoint->id)->exists())
				  {
            array_push($questions_ActivePoint, Question::where('id_quiz', $quiz_ActivePoint->id)->get());
          }
			}

      $answers_ActivePoint[] = array();
      $questions_ActivePoint = array_filter($questions_ActivePoint);
			foreach ($questions_ActivePoint as $question_ActivePoint) {
				array_push($answers_ActivePoint, Answer::where('id_question', $question_ActivePoint->id)->get());
			}

			$data[] = array();
			$data['quizFantasy'] = $quiz;
			$data['questionFantasy'] = $question_Fantasy;
			$data['answerFantasy'] = $answer_Fantasy;
			$data['questionsPA'] = $questions_ActivePoint;
			$data['quizzesPA'] = $quizzes_ActivePoint;
			$data['answersPA'] = $answers_ActivePoint;
			return view('mock.mock',compact('data'));
	}

	public function checkQuestion($response, $id_question)
	{
		$answer_correct = Answer::where('id_question', $id_question->id)->get(['answertext']);
		$flag = false;
		if(strcmp($response, $answer_correct) == 0){
			$flag = true;
			return view('Fantasy.display',compact('flag'));
		}else{
			return view('Fantasy.display',compact('flag'));
		}
	}
}
