@extends('layout.general')
@section('content')
<div class="container fantasy-style">
  <h1 class="mt-4 mb-3 gradiant-tittle">CREATE YOUR OWN FANTASY</h1>
  <div class="pt-25"></div>
  <div class="mlr">
    <div class="row">
      <div class="col-2 menu-pactivo">
        <ul class="ls-none">

          <li><a tittle="Click to open a background selector" id="addBack" ><img class="img-fluid icon-pa" src="{{ asset('assets/stimey/graphics/icons/ICON-Post-File.png') }}"></a></li>
          <li><a title="Click to create active point" id="create"><img class="img-fluid icon-pa" src="{{ asset ( 'assets/stimey/graphics/icons/ICON-Review-Star-Technology.png') }} "></a></li>
        </ul>

      </div>

      <div id="workspace" class="col-9 offset-1 ui-widget-content ">
        <div id="area" class="row">

        </div>
      </div>
    </div>

  </div>

</div>

</div>


<div id="modalBack" class="modalWindow">
  <!-- multistep form -->
  <form id="upload_form" enctype="multipart/form-data">
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Name-Image</li>
      <li>Thopic-Description-State</li>
      <li>Background</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
      <h3 class="fs-subtitle">Name</h3>
      <input id="name" name="name" type="text" placeholder="Fantasy name">
      <h3 class="fs-subtitle">Image</h3>
      <input type="file" id="mainImg" accept="image/png">
      <span id="uploaded_image"> </span>
      <form id="upload_form" enctype="multipart/form-data">
        <a class="boton_personalizado" onclick="href='https://pixlr.com/'" target=”_blank”>Create your own image</a>

        <input type="hidden" id="_token" value="<?php echo date("YmdHis"); ?>" >

        <input type="button" name="next" class="next action-button" value="Next" />
      </fieldset>


      <fieldset>
        <h3 class="fs-subtitle">Thematic</h3>
        <select id="fantasy_theme" class="boton_personalizado" name="theme">
          <option value="Theme" disabled selected>Theme</option>
          <option value="mathematics"> Mathematics</option>
          <option value="science"> Science</option>
          <option value="engineer"> Engineer</option>
          <option value="innovation"> Innovation</option>
          <option value="technology"> Technology</option>
          <option value="physics"> Physics</option>
          <option value="chemistry"> Chemistry</option>
          <option value="biology"> Biology</option>
          <option value="computer science"> Computer Science</option>
        </select>
        <h3 class="fs-subtitle">Difficulty</h3>
        <select id="fantasy_difficulty" class="boton_personalizado" name="theme">
          <option value="easy" selected>Easy</option>
          <option value="medium"> Medium</option>
          <option value="hard"> Hard</option>
          <option value="challenge"> Challenge</option>
        </select>
        <h3 class="fs-subtitle">Privacy</h3>
        <select id="fantasy_privacy" class="boton_personalizado" name="privacy">
          <option value="public" selected> Public</option>
          <option value="semipublic"> Semi-Public</option>
          <option value="private"> Private</option>
        </select>
        <h3 class="fs-subtitle">Description</h3>
        <!--<textarea id="fantasyDescription" rows="4" cols="100%" placeholder="Fantasy Description...">
      </textarea>-->
      <div id="editorFantasy">

      </div>


      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
      <h2 class="fs-subtitle">Background color</h2>
      <input type="hidden" id="_token" value="<?php echo date("YmdHis"); ?>" >
      <input name="color" type="hidden" id="color_value">
      <button class="jscolor {valueElement: 'color_value' }">Pick a color</button>
      <h2 class="fs-subtitle">Select background image</h2>
      <input type="file" id="imgBack"/>
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <button type="submit" class="submit action-button" id="ajaxSubmit"> Save Changes </button>
      <span id="closeA" class="btn btn-default" data-dismiss="modal" ></span>

	<!-- QUIZ FANTASY -->
	<div id="fantasy_quiz_div">

		<button type="button" id="fantasy_quiz_add_question"> Add question </button>
		<button type="button" id="fantasy_quiz_remove_question"> Remove question </button>

		<div id="question0_fantasy_div" style="display: none;">

		      <div class="col-12">
			<label class="form-label"><strong>Question type</strong>
			  <select name="type" id="question0_fantasy_question_type">
			    <option value="0">Regular test</option>
			    <option value="1">Multiple Options</option>
			    <option value="2">Fill the gap</option>
			    <option value="3">Essay question</option>
			  </select>
			</label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question0_fantasy_question_text" type="text"></label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question image (optional)</strong><input id='question0_fantasy_question_image' type="file" name="img"></label>
		      </div>

		      <div id="question0_fantasy_type0">
			<div class="col-12">
			 <label class="form-label"><strong>CORRECT answer</strong><input id="question0_fantasy_answer_correct" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question0_fantasy_answer_incorrect0" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question0_fantasy_answer_incorrect1" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question0_fantasy_answer_incorrect2" type="text"></label>
			</div>
		      </div>

		      <div id="question0_fantasy_type1" style="display: none;">
			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question0_fantasy_answer0_check"> </label>
			 <label class="form-label"><strong> Option 0 </strong><input id="question0_fantasy_answer0" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question0_fantasy_answer1_check"> </label>
			 <label class="form-label"><strong> Option 1 </strong><input id="question0_fantasy_answer1" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question0_fantasy_answer2_check"> </label>
			 <label class="form-label"><strong> Option 2 </strong><input id="question0_fantasy_answer2" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question0_fantasy_answer3_check"> </label>
			 <label class="form-label"><strong> Option 3 </strong><input id="question0_fantasy_answer3" type="text"> </label>
			</div>
		      </div>

		      <div id="question0_fantasy_type2" style="display: none;">
			<label class="form-label"><strong> Correct word </strong><input id="question0_fantasy_gapword" type="text"> </label>
		      </div>

		</div>

		<div id="question1_fantasy_div" style="display: none;">

		      <div class="col-12">
			<label class="form-label"><strong>Question type</strong>
			  <select name="type" id="question1_fantasy_question_type">
			    <option value="0">Regular test</option>
			    <option value="1">Multiple Options</option>
			    <option value="2">Fill the gap</option>
			    <option value="3">Essay question</option>
			  </select>
			</label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question1_fantasy_question_text" type="text"></label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question image (optional)</strong><input id='question1_fantasy_question_image' type="file" name="img"></label>
		      </div>

		      <div id="question1_fantasy_type0">
			<div class="col-12">
			 <label class="form-label"><strong>CORRECT answer</strong><input id="question1_fantasy_answer_correct" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question1_fantasy_answer_incorrect0" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question1_fantasy_answer_incorrect1" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question1_fantasy_answer_incorrect2" type="text"></label>
			</div>
		      </div>

		      <div id="question1_fantasy_type1" style="display: none;">
			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question1_fantasy_answer0_check"> </label>
			 <label class="form-label"><strong> Option 0 </strong><input id="question1_fantasy_answer0" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question1_fantasy_answer1_check"> </label>
			 <label class="form-label"><strong> Option 1 </strong><input id="question1_fantasy_answer1" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question1_fantasy_answer2_check"> </label>
			 <label class="form-label"><strong> Option 2 </strong><input id="question1_fantasy_answer2" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question1_fantasy_answer3_check"> </label>
			 <label class="form-label"><strong> Option 3 </strong><input id="question1_fantasy_answer3" type="text"> </label>
			</div>
		      </div>

		      <div id="question1_fantasy_type2" style="display: none;">
			<label class="form-label"><strong> Correct word </strong><input id="question1_fantasy_gapword" type="text"> </label>
		      </div>

		</div>

		<div id="question2_fantasy_div" style="display: none;">

		      <div class="col-12">
			<label class="form-label"><strong>Question type</strong>
			  <select name="type" id="question2_fantasy_question_type">
			    <option value="0">Regular test</option>
			    <option value="1">Multiple Options</option>
			    <option value="2">Fill the gap</option>
			    <option value="3">Essay question</option>
			  </select>
			</label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question2_fantasy_question_text" type="text"></label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question image (optional)</strong><input id='question2_fantasy_question_image' type="file" name="img"></label>
		      </div>

		      <div id="question2_fantasy_type0">
			<div class="col-12">
			 <label class="form-label"><strong>CORRECT answer</strong><input id="question2_fantasy_answer_correct" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question2_fantasy_answer_incorrect0" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question2_fantasy_answer_incorrect1" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question2_fantasy_answer_incorrect2" type="text"></label>
			</div>
		      </div>

		      <div id="question2_fantasy_type1" style="display: none;">
			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question2_fantasy_answer0_check"> </label>
			 <label class="form-label"><strong> Option 0 </strong><input id="question2_fantasy_answer0" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question2_fantasy_answer1_check"> </label>
			 <label class="form-label"><strong> Option 1 </strong><input id="question2_fantasy_answer1" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question2_fantasy_answer2_check"> </label>
			 <label class="form-label"><strong> Option 2 </strong><input id="question2_fantasy_answer2" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question2_fantasy_answer3_check"> </label>
			 <label class="form-label"><strong> Option 3 </strong><input id="question2_fantasy_answer3" type="text"> </label>
			</div>
		      </div>

		      <div id="question2_fantasy_type2" style="display: none;">
			<label class="form-label"><strong> Correct word </strong><input id="question2_fantasy_gapword" type="text"> </label>
		      </div>

		</div>

		<div id="question3_fantasy_div" style="display: none;">

		      <div class="col-12">
			<label class="form-label"><strong>Question type</strong>
			  <select name="type" id="question3_fantasy_question_type">
			    <option value="0">Regular test</option>
			    <option value="1">Multiple Options</option>
			    <option value="2">Fill the gap</option>
			    <option value="3">Essay question</option>
			  </select>
			</label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question3_fantasy_question_text" type="text"></label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question image (optional)</strong><input id='question3_fantasy_question_image' type="file" name="img"></label>
		      </div>

		      <div id="question3_fantasy_type0">
			<div class="col-12">
			 <label class="form-label"><strong>CORRECT answer</strong><input id="question3_fantasy_answer_correct" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question3_fantasy_answer_incorrect0" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question3_fantasy_answer_incorrect1" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question3_fantasy_answer_incorrect2" type="text"></label>
			</div>
		      </div>

		      <div id="question3_fantasy_type1" style="display: none;">
			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question3_fantasy_answer0_check"> </label>
			 <label class="form-label"><strong> Option 0 </strong><input id="question3_fantasy_answer0" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question3_fantasy_answer1_check"> </label>
			 <label class="form-label"><strong> Option 1 </strong><input id="question3_fantasy_answer1" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question3_fantasy_answer2_check"> </label>
			 <label class="form-label"><strong> Option 2 </strong><input id="question3_fantasy_answer2" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question3_fantasy_answer3_check"> </label>
			 <label class="form-label"><strong> Option 3 </strong><input id="question3_fantasy_answer3" type="text"> </label>
			</div>
		      </div>

		      <div id="question3_fantasy_type2" style="display: none;">
			<label class="form-label"><strong> Correct word </strong><input id="question3_fantasy_gapword" type="text"> </label>
		      </div>

		</div>

		<div id="question4_fantasy_div" style="display: none;">

		      <div class="col-12">
			<label class="form-label"><strong>Question type</strong>
			  <select name="type" id="question4_fantasy_question_type">
			    <option value="0">Regular test</option>
			    <option value="1">Multiple Options</option>
			    <option value="2">Fill the gap</option>
			    <option value="3">Essay question</option>
			  </select>
			</label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question4_fantasy_question_text" type="text"></label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question image (optional)</strong><input id='question4_fantasy_question_image' type="file" name="img"></label>
		      </div>

		      <div id="question4_fantasy_type0">
			<div class="col-12">
			 <label class="form-label"><strong>CORRECT answer</strong><input id="question4_fantasy_answer_correct" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question4_fantasy_answer_incorrect0" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question4_fantasy_answer_incorrect1" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question4_fantasy_answer_incorrect2" type="text"></label>
			</div>
		      </div>

		      <div id="question4_fantasy_type1" style="display: none;">
			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question4_fantasy_answer0_check"> </label>
			 <label class="form-label"><strong> Option 0 </strong><input id="question4_fantasy_answer0" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question4_fantasy_answer1_check"> </label>
			 <label class="form-label"><strong> Option 1 </strong><input id="question4_fantasy_answer1" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question4_fantasy_answer2_check"> </label>
			 <label class="form-label"><strong> Option 2 </strong><input id="question4_fantasy_answer2" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question4_fantasy_answer3_check"> </label>
			 <label class="form-label"><strong> Option 3 </strong><input id="question4_fantasy_answer3" type="text"> </label>
			</div>
		      </div>

		      <div id="question4_fantasy_type2" style="display: none;">
			<label class="form-label"><strong> Correct word </strong><input id="question4_fantasy_gapword" type="text"> </label>
		      </div>

		</div>

		<div id="question5_fantasy_div" style="display: none;">

		      <div class="col-12">
			<label class="form-label"><strong>Question type</strong>
			  <select name="type" id="question5_fantasy_question_type">
			    <option value="0">Regular test</option>
			    <option value="1">Multiple Options</option>
			    <option value="2">Fill the gap</option>
			    <option value="3">Essay question</option>
			  </select>
			</label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question5_fantasy_question_text" type="text"></label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question image (optional)</strong><input id='question5_fantasy_question_image' type="file" name="img"></label>
		      </div>

		      <div id="question5_fantasy_type0">
			<div class="col-12">
			 <label class="form-label"><strong>CORRECT answer</strong><input id="question5_fantasy_answer_correct" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question5_fantasy_answer_incorrect0" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question5_fantasy_answer_incorrect1" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question5_fantasy_answer_incorrect2" type="text"></label>
			</div>
		      </div>

		      <div id="question5_fantasy_type1" style="display: none;">
			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question5_fantasy_answer0_check"> </label>
			 <label class="form-label"><strong> Option 0 </strong><input id="question5_fantasy_answer0" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question5_fantasy_answer1_check"> </label>
			 <label class="form-label"><strong> Option 1 </strong><input id="question5_fantasy_answer1" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question5_fantasy_answer2_check"> </label>
			 <label class="form-label"><strong> Option 2 </strong><input id="question5_fantasy_answer2" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question5_fantasy_answer3_check"> </label>
			 <label class="form-label"><strong> Option 3 </strong><input id="question5_fantasy_answer3" type="text"> </label>
			</div>
		      </div>

		      <div id="question5_fantasy_type2" style="display: none;">
			<label class="form-label"><strong> Correct word </strong><input id="question5_fantasy_gapword" type="text"> </label>
		      </div>

		</div>


		<div id="question6_fantasy_div" style="display: none;">

		      <div class="col-12">
			<label class="form-label"><strong>Question type</strong>
			  <select name="type" id="question6_fantasy_question_type">
			    <option value="0">Regular test</option>
			    <option value="1">Multiple Options</option>
			    <option value="2">Fill the gap</option>
			    <option value="3">Essay question</option>
			  </select>
			</label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question6_fantasy_question_text" type="text"></label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question image (optional)</strong><input id='question6_fantasy_question_image' type="file" name="img"></label>
		      </div>

		      <div id="question6_fantasy_type0">
			<div class="col-12">
			 <label class="form-label"><strong>CORRECT answer</strong><input id="question6_fantasy_answer_correct" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question6_fantasy_answer_incorrect0" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question6_fantasy_answer_incorrect1" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question6_fantasy_answer_incorrect2" type="text"></label>
			</div>
		      </div>

		      <div id="question6_fantasy_type1" style="display: none;">
			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question6_fantasy_answer0_check"> </label>
			 <label class="form-label"><strong> Option 0 </strong><input id="question6_fantasy_answer0" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question6_fantasy_answer1_check"> </label>
			 <label class="form-label"><strong> Option 1 </strong><input id="question6_fantasy_answer1" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question6_fantasy_answer2_check"> </label>
			 <label class="form-label"><strong> Option 2 </strong><input id="question6_fantasy_answer2" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question6_fantasy_answer3_check"> </label>
			 <label class="form-label"><strong> Option 3 </strong><input id="question6_fantasy_answer3" type="text"> </label>
			</div>
		      </div>

		      <div id="question6_fantasy_type2" style="display: none;">
			<label class="form-label"><strong> Correct word </strong><input id="question6_fantasy_gapword" type="text"> </label>
		      </div>

		</div>


		<div id="question7_fantasy_div" style="display: none;">

		      <div class="col-12">
			<label class="form-label"><strong>Question type</strong>
			  <select name="type" id="question7_fantasy_question_type">
			    <option value="0">Regular test</option>
			    <option value="1">Multiple Options</option>
			    <option value="2">Fill the gap</option>
			    <option value="3">Essay question</option>
			  </select>
			</label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question7_fantasy_question_text" type="text"></label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question image (optional)</strong><input id='question7_fantasy_question_image' type="file" name="img"></label>
		      </div>

		      <div id="question7_fantasy_type0">
			<div class="col-12">
			 <label class="form-label"><strong>CORRECT answer</strong><input id="question7_fantasy_answer_correct" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question7_fantasy_answer_incorrect0" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question7_fantasy_answer_incorrect1" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question7_fantasy_answer_incorrect2" type="text"></label>
			</div>
		      </div>

		      <div id="question7_fantasy_type1" style="display: none;">
			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question7_fantasy_answer0_check"> </label>
			 <label class="form-label"><strong> Option 0 </strong><input id="question7_fantasy_answer0" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question7_fantasy_answer1_check"> </label>
			 <label class="form-label"><strong> Option 1 </strong><input id="question7_fantasy_answer1" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question7_fantasy_answer2_check"> </label>
			 <label class="form-label"><strong> Option 2 </strong><input id="question7_fantasy_answer2" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question7_fantasy_answer3_check"> </label>
			 <label class="form-label"><strong> Option 3 </strong><input id="question7_fantasy_answer3" type="text"> </label>
			</div>
		      </div>

		      <div id="question7_fantasy_type2" style="display: none;">
			<label class="form-label"><strong> Correct word </strong><input id="question7_fantasy_gapword" type="text"> </label>
		      </div>

		</div>

		<div id="question8_fantasy_div" style="display: none;">

		      <div class="col-12">
			<label class="form-label"><strong>Question type</strong>
			  <select name="type" id="question8_fantasy_question_type">
			    <option value="0">Regular test</option>
			    <option value="1">Multiple Options</option>
			    <option value="2">Fill the gap</option>
			    <option value="3">Essay question</option>
			  </select>
			</label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question8_fantasy_question_text" type="text"></label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question image (optional)</strong><input id='question8_fantasy_question_image' type="file" name="img"></label>
		      </div>

		      <div id="question8_fantasy_type0">
			<div class="col-12">
			 <label class="form-label"><strong>CORRECT answer</strong><input id="question8_fantasy_answer_correct" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question8_fantasy_answer_incorrect0" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question8_fantasy_answer_incorrect1" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question8_fantasy_answer_incorrect2" type="text"></label>
			</div>
		      </div>

		      <div id="question8_fantasy_type1" style="display: none;">
			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question8_fantasy_answer0_check"> </label>
			 <label class="form-label"><strong> Option 0 </strong><input id="question8_fantasy_answer0" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question8_fantasy_answer1_check"> </label>
			 <label class="form-label"><strong> Option 1 </strong><input id="question8_fantasy_answer1" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question8_fantasy_answer2_check"> </label>
			 <label class="form-label"><strong> Option 2 </strong><input id="question8_fantasy_answer2" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question8_fantasy_answer3_check"> </label>
			 <label class="form-label"><strong> Option 3 </strong><input id="question8_fantasy_answer3" type="text"> </label>
			</div>
		      </div>

		      <div id="question8_fantasy_type2" style="display: none;">
			<label class="form-label"><strong> Correct word </strong><input id="question8_fantasy_gapword" type="text"> </label>
		      </div>

		</div>


		<div id="question9_fantasy_div" style="display: none;">

		      <div class="col-12">
			<label class="form-label"><strong>Question type</strong>
			  <select name="type" id="question9_fantasy_question_type">
			    <option value="0">Regular test</option>
			    <option value="1">Multiple Options</option>
			    <option value="2">Fill the gap</option>
			    <option value="3">Essay question</option>
			  </select>
			</label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question9_fantasy_question_text" type="text"></label>
		      </div>

		      <div class="col-12">
			<label class="form-label"><strong>Question image (optional)</strong><input id='question9_fantasy_question_image' type="file" name="img"></label>
		      </div>

		      <div id="question9_fantasy_type0">
			<div class="col-12">
			 <label class="form-label"><strong>CORRECT answer</strong><input id="question9_fantasy_answer_correct" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question9_fantasy_answer_incorrect0" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question9_fantasy_answer_incorrect1" type="text"></label>
			</div>

			<div class="col-12">
			 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question9_fantasy_answer_incorrect2" type="text"></label>
			</div>
		      </div>

		      <div id="question9_fantasy_type1" style="display: none;">
			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question9_fantasy_answer0_check"> </label>
			 <label class="form-label"><strong> Option 0 </strong><input id="question9_fantasy_answer0" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question9_fantasy_answer1_check"> </label>
			 <label class="form-label"><strong> Option 1 </strong><input id="question9_fantasy_answer1" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question9_fantasy_answer2_check"> </label>
			 <label class="form-label"><strong> Option 2 </strong><input id="question9_fantasy_answer2" type="text"> </label>
			</div>

			<div class="col-12">
			 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question9_fantasy_answer3_check"> </label>
			 <label class="form-label"><strong> Option 3 </strong><input id="question9_fantasy_answer3" type="text"> </label>
			</div>
		      </div>

		      <div id="question9_fantasy_type2" style="display: none;">
			<label class="form-label"><strong> Correct word </strong><input id="question9_fantasy_gapword" type="text"> </label>
		      </div>

		</div>


	    </div>
	<!-- END QUIZ FANTASY-->

    </fieldset>
  </form>
</div>


<div id="modalPA" class="modalWindow"> <!-- Active Point Modal -->
  <form id="upload_form_PA" enctype="multipart/form-data">
    <ul id="progressbar">
      <li class="active">General</li>
      <li>Resources</li>
      <li>Quiz</li>
    </ul>
    <fieldset>
      <input id="id_pa_modal" type="hidden">
      <div class="col-12">
        <label class="form-label"><strong>Name</strong><input id='name_ap' type="text" name="name"></label>
      </div>
      <div class="col-12">
        <label class="form-label"><strong>Image of active Point</strong><input id='image_ap' type="file" name="img"></label>
      </div>

      <div class="col-12">
        <label class="form-label"><strong>Order</strong>
          <select name="order" id="turn_ap">
            <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
          </select>
        </label>
      </div>

      <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>


    <fieldset>
      <div class="col-12">
        <label class="form-label"><strong>Audio</strong><input id="audio_ap" type="file" name="audio"></label>
      </div>


      <div class="col-12">
        <label class="form-label"><strong>Complementary Text</strong><div id="text_ap">

        </div>
      </label>
      </div>
      <div class="col-12">
        <label class="form-label"><strong>Video url</strong><input id="video_ap" type="text" name="videoUrl"></label>
      </div>
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>

    <fieldset>
      <input type="hidden" id="_token_ap">
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <button type="submit" class="submit action-button" id="ajaxSubmitAP"> Save active point </button>

     <!-- Quiz AP -->
     <div id="ap_quiz_div">

	<button type="button" id="ap_quiz_add_question"> Add question </button>
	<button type="button" id="ap_quiz_remove_question"> Remove question </button>

	<div id="question0_ap_div" style="display: none;">

	      <div class="col-12">
		<label class="form-label"><strong>Question type</strong>
		  <select name="type" id="question0_ap_question_type">
		    <option value="0">Regular test</option>
		    <option value="1">Multiple Options</option>
		    <option value="2">Fill the gap</option>
		  </select>
		</label>
	      </div>

	      <div class="col-12">
		<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question0_ap_question_text" type="text"></label>
	      </div>

	      <div class="col-12">
		<label class="form-label"><strong>Question score</strong><input id="question0_ap_question_score" type="number"></label>
	      </div>

	      <div id="question0_ap_type0">
		<div class="col-12">
		 <label class="form-label"><strong>CORRECT answer</strong><input id="question0_ap_answer_correct" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question0_ap_answer_incorrect0" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question0_ap_answer_incorrect1" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question0_ap_answer_incorrect2" type="text"></label>
		</div>
	      </div>

	      <div id="question0_ap_type1" style="display: none;">
		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question0_ap_answer0_check"> </label>
		 <label class="form-label"><strong> Option 0 </strong><input id="question0_ap_answer0" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question0_ap_answer1_check"> </label>
		 <label class="form-label"><strong> Option 1 </strong><input id="question0_ap_answer1" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question0_ap_answer2_check"> </label>
		 <label class="form-label"><strong> Option 2 </strong><input id="question0_ap_answer2" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question0_ap_answer3_check"> </label>
		 <label class="form-label"><strong> Option 3 </strong><input id="question0_ap_answer3" type="text"> </label>
		</div>
	      </div>

	      <div id="question0_ap_type2" style="display: none;">
		<label class="form-label"><strong> Correct word </strong><input id="question0_ap_gapword" type="text"> </label>
	      </div>

        </div>

	<div id="question1_ap_div" style="display: none;">

	      <div class="col-12">
		<label class="form-label"><strong>Question type</strong>
		  <select name="type" id="question1_ap_question_type">
		    <option value="0">Regular test</option>
		    <option value="1">Multiple Options</option>
		    <option value="2">Fill the gap</option>
		  </select>
		</label>
	      </div>

	      <div class="col-12">
		<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question1_ap_question_text" type="text"></label>
	      </div>

	      <div class="col-12">
		<label class="form-label"><strong>Question score</strong><input id="question1_ap_question_score" type="number"></label>
	      </div>

	      <div id="question1_ap_type0">
		<div class="col-12">
		 <label class="form-label"><strong>CORRECT answer</strong><input id="question1_ap_answer_correct" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question1_ap_answer_incorrect0" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question1_ap_answer_incorrect1" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question1_ap_answer_incorrect2" type="text"></label>
		</div>
	      </div>

	      <div id="question1_ap_type1" style="display: none;">
		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question1_ap_answer0_check"> </label>
		 <label class="form-label"><strong> Option 0 </strong><input id="question1_ap_answer0" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question1_ap_answer1_check"> </label>
		 <label class="form-label"><strong> Option 1 </strong><input id="question1_ap_answer1" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question1_ap_answer2_check"> </label>
		 <label class="form-label"><strong> Option 2 </strong><input id="question1_ap_answer2" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question1_ap_answer3_check"> </label>
		 <label class="form-label"><strong> Option 3 </strong><input id="question1_ap_answer3" type="text"> </label>
		</div>
	      </div>

	      <div id="question1_ap_type2" style="display: none;">
		<label class="form-label"><strong> Correct word </strong><input id="question1_ap_gapword" type="text"> </label>
	      </div>

        </div>

	<div id="question2_ap_div" style="display: none;">

	      <div class="col-12">
		<label class="form-label"><strong>Question type</strong>
		  <select name="type" id="question2_ap_question_type">
		    <option value="0">Regular test</option>
		    <option value="1">Multiple Options</option>
		    <option value="2">Fill the gap</option>
		  </select>
		</label>
	      </div>

	      <div class="col-12">
		<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question2_ap_question_text" type="text"></label>
	      </div>

	      <div class="col-12">
		<label class="form-label"><strong>Question score</strong><input id="question2_ap_question_score" type="number"></label>
	      </div>

	      <div id="question2_ap_type0">
		<div class="col-12">
		 <label class="form-label"><strong>CORRECT answer</strong><input id="question2_ap_answer_correct" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question2_ap_answer_incorrect0" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question2_ap_answer_incorrect1" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question2_ap_answer_incorrect2" type="text"></label>
		</div>
	      </div>

	      <div id="question2_ap_type1" style="display: none;">
		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question2_ap_answer0_check"> </label>
		 <label class="form-label"><strong> Option 0 </strong><input id="question2_ap_answer0" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question2_ap_answer1_check"> </label>
		 <label class="form-label"><strong> Option 1 </strong><input id="question2_ap_answer1" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question2_ap_answer2_check"> </label>
		 <label class="form-label"><strong> Option 2 </strong><input id="question2_ap_answer2" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question2_ap_answer3_check"> </label>
		 <label class="form-label"><strong> Option 3 </strong><input id="question2_ap_answer3" type="text"> </label>
		</div>
	      </div>

	      <div id="question2_ap_type2" style="display: none;">
		<label class="form-label"><strong> Correct word </strong><input id="question2_ap_gapword" type="text"> </label>
	      </div>

        </div>

	<div id="question3_ap_div" style="display: none;">

	      <div class="col-12">
		<label class="form-label"><strong>Question type</strong>
		  <select name="type" id="question3_ap_question_type">
		    <option value="0">Regular test</option>
		    <option value="1">Multiple Options</option>
		    <option value="2">Fill the gap</option>
		  </select>
		</label>
	      </div>

	      <div class="col-12">
		<label class="form-label"><strong>Question (leave the gap if that"s the option !)</strong><input id="question3_ap_question_text" type="text"></label>
	      </div>

	      <div class="col-12">
		<label class="form-label"><strong>Question score</strong><input id="question3_ap_question_score" type="number"></label>
	      </div>

	      <div id="question3_ap_type0">
		<div class="col-12">
		 <label class="form-label"><strong>CORRECT answer</strong><input id="question3_ap_answer_correct" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 1</strong><input id="question3_ap_answer_incorrect0" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 2</strong><input id="question3_ap_answer_incorrect1" type="text"></label>
		</div>

		<div class="col-12">
		 <label class="form-label"><strong>Incorrect answer 3</strong><input id="question3_ap_answer_incorrect2" type="text"></label>
		</div>
	      </div>

	      <div id="question3_ap_type1" style="display: none;">
		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question3_ap_answer0_check"> </label>
		 <label class="form-label"><strong> Option 0 </strong><input id="question3_ap_answer0" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question3_ap_answer1_check"> </label>
		 <label class="form-label"><strong> Option 1 </strong><input id="question3_ap_answer1" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question3_ap_answer2_check"> </label>
		 <label class="form-label"><strong> Option 2 </strong><input id="question3_ap_answer2" type="text"> </label>
		</div>

		<div class="col-12">
		 <label class="form-label"> Is this answer correct? <input type="checkbox" id="question3_ap_answer3_check"> </label>
		 <label class="form-label"><strong> Option 3 </strong><input id="question3_ap_answer3" type="text"> </label>
		</div>
	      </div>

	      <div id="question3_ap_type2" style="display: none;">
		<label class="form-label"><strong> Correct word </strong><input id="question3_ap_gapword" type="text"> </label>
	      </div>

        </div>

    </div>
<!-- Quiz AP -->

    </fieldset>



  </form>
</div>


<div class="box invisible">
  <a id="alerta1" class="button" href="#popup1">Let me Pop up</a>
</div>

<div id="popup1" class="overlay">
  <div class="popup">
    <h2>Sorry!</h2>
    <a class="close" href="#">&times;</a>
    <div class="content">
      You can't add more active points!
    </div>
  </div>
</div>



<script type="text/javascript">

// Fantasy Quiz Handler

// The current lastest question added to the fantasy, -1 means no questions added.
var fantasy_current_question = -1;

// Shows and hides question divs when clicking on the add and remove question buttons
$('#fantasy_quiz_add_question').click(function(){
	if(fantasy_current_question < 9) {
		fantasy_current_question++;
		$('#question' + fantasy_current_question + '_fantasy_div').show();
	}
});

$('#fantasy_quiz_remove_question').click(function(){
	if(fantasy_current_question >= 0) {
		$('#question' + fantasy_current_question + '_fantasy_div').hide();
		fantasy_current_question--;
	}
});
// Changes the input fields of each question depending on type selected
$('#question0_fantasy_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question0_fantasy_type0').show();
			$('#question0_fantasy_type1').hide();
			$('#question0_fantasy_type2').hide();
			break;
		case '1':
			$('#question0_fantasy_type0').hide();
			$('#question0_fantasy_type1').show();
			$('#question0_fantasy_type2').hide();
			break;
		case '2':
			$('#question0_fantasy_type0').hide();
			$('#question0_fantasy_type1').hide();
			$('#question0_fantasy_type2').show();
			break;
		case '3':
			$('#question0_fantasy_type0').hide();
			$('#question0_fantasy_type1').hide();
			$('#question0_fantasy_type2').hide();
	}
});
$('#question1_fantasy_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question1_fantasy_type0').show();
			$('#question1_fantasy_type1').hide();
			$('#question1_fantasy_type2').hide();
			break;
		case '1':
			$('#question1_fantasy_type0').hide();
			$('#question1_fantasy_type1').show();
			$('#question1_fantasy_type2').hide();
			break;
		case '2':
			$('#question1_fantasy_type0').hide();
			$('#question1_fantasy_type1').hide();
			$('#question1_fantasy_type2').show();
			break;
		case '3':
			$('#question1_fantasy_type0').hide();
			$('#question1_fantasy_type1').hide();
			$('#question1_fantasy_type2').hide();
	}
});
$('#question2_fantasy_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question2_fantasy_type0').show();
			$('#question2_fantasy_type1').hide();
			$('#question2_fantasy_type2').hide();
			break;
		case '1':
			$('#question2_fantasy_type0').hide();
			$('#question2_fantasy_type1').show();
			$('#question2_fantasy_type2').hide();
			break;
		case '2':
			$('#question2_fantasy_type0').hide();
			$('#question2_fantasy_type1').hide();
			$('#question2_fantasy_type2').show();
			break;
		case '3':
			$('#question2_fantasy_type0').hide();
			$('#question2_fantasy_type1').hide();
			$('#question2_fantasy_type2').hide();
	}
});
$('#question3_fantasy_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question3_fantasy_type0').show();
			$('#question3_fantasy_type1').hide();
			$('#question3_fantasy_type2').hide();
			break;
		case '1':
			$('#question3_fantasy_type0').hide();
			$('#question3_fantasy_type1').show();
			$('#question3_fantasy_type2').hide();
			break;
		case '2':
			$('#question3_fantasy_type0').hide();
			$('#question3_fantasy_type1').hide();
			$('#question3_fantasy_type2').show();
			break;
		case '3':
			$('#question3_fantasy_type0').hide();
			$('#question3_fantasy_type1').hide();
			$('#question3_fantasy_type2').hide();
	}
});
$('#question4_fantasy_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question4_fantasy_type0').show();
			$('#question4_fantasy_type1').hide();
			$('#question4_fantasy_type2').hide();
			break;
		case '1':
			$('#question4_fantasy_type0').hide();
			$('#question4_fantasy_type1').show();
			$('#question4_fantasy_type2').hide();
			break;
		case '2':
			$('#question4_fantasy_type0').hide();
			$('#question4_fantasy_type1').hide();
			$('#question4_fantasy_type2').show();
			break;
		case '3':
			$('#question4_fantasy_type0').hide();
			$('#question4_fantasy_type1').hide();
			$('#question4_fantasy_type2').hide();
	}
});
$('#question5_fantasy_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question5_fantasy_type0').show();
			$('#question5_fantasy_type1').hide();
			$('#question5_fantasy_type2').hide();
			break;
		case '1':
			$('#question5_fantasy_type0').hide();
			$('#question5_fantasy_type1').show();
			$('#question5_fantasy_type2').hide();
			break;
		case '2':
			$('#question5_fantasy_type0').hide();
			$('#question5_fantasy_type1').hide();
			$('#question5_fantasy_type2').show();
			break;
		case '3':
			$('#question5_fantasy_type0').hide();
			$('#question5_fantasy_type1').hide();
			$('#question5_fantasy_type2').hide();
	}
});
$('#question6_fantasy_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question6_fantasy_type0').show();
			$('#question6_fantasy_type1').hide();
			$('#question6_fantasy_type2').hide();
			break;
		case '1':
			$('#question6_fantasy_type0').hide();
			$('#question6_fantasy_type1').show();
			$('#question6_fantasy_type2').hide();
			break;
		case '2':
			$('#question6_fantasy_type0').hide();
			$('#question6_fantasy_type1').hide();
			$('#question6_fantasy_type2').show();
			break;
		case '3':
			$('#question6_fantasy_type0').hide();
			$('#question6_fantasy_type1').hide();
			$('#question6_fantasy_type2').hide();
	}
});
$('#question7_fantasy_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question7_fantasy_type0').show();
			$('#question7_fantasy_type1').hide();
			$('#question7_fantasy_type2').hide();
			break;
		case '1':
			$('#question7_fantasy_type0').hide();
			$('#question7_fantasy_type1').show();
			$('#question7_fantasy_type2').hide();
			break;
		case '2':
			$('#question7_fantasy_type0').hide();
			$('#question7_fantasy_type1').hide();
			$('#question7_fantasy_type2').show();
			break;
		case '3':
			$('#question7_fantasy_type0').hide();
			$('#question7_fantasy_type1').hide();
			$('#question7_fantasy_type2').hide();
	}
});
$('#question8_fantasy_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question8_fantasy_type0').show();
			$('#question8_fantasy_type1').hide();
			$('#question8_fantasy_type2').hide();
			break;
		case '1':
			$('#question8_fantasy_type0').hide();
			$('#question8_fantasy_type1').show();
			$('#question8_fantasy_type2').hide();
			break;
		case '2':
			$('#question8_fantasy_type0').hide();
			$('#question8_fantasy_type1').hide();
			$('#question8_fantasy_type2').show();
			break;
		case '3':
			$('#question8_fantasy_type0').hide();
			$('#question8_fantasy_type1').hide();
			$('#question8_fantasy_type2').hide();
	}
});
$('#question9_fantasy_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question9_fantasy_type0').show();
			$('#question9_fantasy_type1').hide();
			$('#question9_fantasy_type2').hide();
			break;
		case '1':
			$('#question9_fantasy_type0').hide();
			$('#question9_fantasy_type1').show();
			$('#question9_fantasy_type2').hide();
			break;
		case '2':
			$('#question9_fantasy_type0').hide();
			$('#question9_fantasy_type1').hide();
			$('#question9_fantasy_type2').show();
			break;
		case '3':
			$('#question9_fantasy_type0').hide();
			$('#question9_fantasy_type1').hide();
			$('#question9_fantasy_type2').hide();
	}
});
// End of Fantasy Quiz Handler



// AP quiz handler

// The current latest question added to an AP, -1 means no questions added.
var ap_current_question = -1;

// Shows and hides question divs when clicking on the add and remove question buttons
$('#ap_quiz_add_question').click(function(){
	if(ap_current_question < 3) {
		ap_current_question++;
		$('#question' + ap_current_question + '_ap_div').show();
	}
});

$('#ap_quiz_remove_question').click(function(){
	if(ap_current_question >= 0) {
		$('#question' + ap_current_question + '_ap_div').hide();
		ap_current_question--;
	}
});

// Changes the input fields of each question depending on type selected
$('#question0_ap_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question0_ap_type0').show();
			$('#question0_ap_type1').hide();
			$('#question0_ap_type2').hide();
			break;
		case '1':
			$('#question0_ap_type0').hide();
			$('#question0_ap_type1').show();
			$('#question0_ap_type2').hide();
			break;
		case '2':
			$('#question0_ap_type0').hide();
			$('#question0_ap_type1').hide();
			$('#question0_ap_type2').show();
	}
});
$('#question1_ap_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question1_ap_type0').show();
			$('#question1_ap_type1').hide();
			$('#question1_ap_type2').hide();
			break;
		case '1':
			$('#question1_ap_type0').hide();
			$('#question1_ap_type1').show();
			$('#question1_ap_type2').hide();
			break;
		case '2':
			$('#question1_ap_type0').hide();
			$('#question1_ap_type1').hide();
			$('#question1_ap_type2').show();
	}
});
$('#question2_ap_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question2_ap_type0').show();
			$('#question2_ap_type1').hide();
			$('#question2_ap_type2').hide();
			break;
		case '1':
			$('#question2_ap_type0').hide();
			$('#question2_ap_type1').show();
			$('#question2_ap_type2').hide();
			break;
		case '2':
			$('#question2_ap_type0').hide();
			$('#question2_ap_type1').hide();
			$('#question2_ap_type2').show();
	}
});
$('#question3_ap_question_type').on('change',function(){
	var selected = $(this).val();
	switch(selected) {
		case '0':
			$('#question3_ap_type0').show();
			$('#question3_ap_type1').hide();
			$('#question3_ap_type2').hide();
			break;
		case '1':
			$('#question3_ap_type0').hide();
			$('#question3_ap_type1').show();
			$('#question3_ap_type2').hide();
			break;
		case '2':
			$('#question3_ap_type0').hide();
			$('#question3_ap_type1').hide();
			$('#question3_ap_type2').show();
	}
});

// End of AP quiz handler


// Used to reset the AP modal to its default state
function resetAPModal() {

	$('#name_ap').prop("value","");
	$('#turn_ap').prop("selectedIndex",0);
	$('#video_ap').prop("value","");
	$('#text_ap').find('.ql-editor')[0].innerHTML = "";

	ap_current_question = -1;

	for(var j=0; j <= 2; j++) {

		$('#question' + j + '_ap_div').hide();
		$('#question' + j + '_ap_question_type').prop("selectedIndex",0);
		$('#question' + j + '_ap_question_text').prop("value","");
		$('#question' + j + '_ap_question_score').prop("value","");

		$('#question' + j + '_ap_type0').show();
		$('#question' + j + '_ap_type1').hide();
		$('#question' + j + '_ap_type2').hide();

		$('#question' + j + '_ap_answer_correct').prop("value","");
		$('#question' + j + '_ap_answer_incorrect0').prop("value","");
		$('#question' + j + '_ap_answer_incorrect1').prop("value","");
		$('#question' + j + '_ap_answer_incorrect2').prop("value","");

		$('#question' + j + '_ap_answer0').prop("value","");
		$('#question' + j + '_ap_answer1').prop("value","");
		$('#question' + j + '_ap_answer2').prop("value","");
		$('#question' + j + '_ap_answer3').prop("value","");
		$('#question' + j + '_ap_answer0_check').prop("checked",false);
		$('#question' + j + '_ap_answer1_check').prop("checked",false);
		$('#question' + j + '_ap_answer2_check').prop("checked",false);
		$('#question' + j + '_ap_answer3_check').prop("checked",false);

		$('#question' + j + '_ap_gapword').prop("value","");

	}

}






// Code called once on page load, to fill the fantasy modal with existing data
jQuery(document).ready(function(){

	var form_data = new FormData();
	form_data.append('fantasy_token', $('#_token').val());

	$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});
	jQuery.ajax({
	url: "{{ url('/fantasy/modalFields') }}",
	method: 'post',
	contentType: false, // The content type used when sending data to the server.
	cache: false, // To unable request pages to be cached
	processData: false,
	data: form_data,
	success:function(data)
	{
		//console.log(data);
		if(data) {

			if(data.name)
				$('#name').attr("value",data.name);

			if(data.topic)
				$('#fantasy_theme').attr("selectedIndex",data.topic - 1);

			if(data.description)
				$('#editorFantasy').find('.ql-editor')[0].innerHTML = data.description;

		}

			$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
			});
			jQuery.ajax({
			url: "{{ url('/quiz/FantasyModalFields') }}",
			method: 'post',
			contentType: false, // The content type used when sending data to the server.
			cache: false, // To unable request pages to be cached
			processData: false,
			data: form_data, // The same FormData can be used, as the request only needs the fantasy token
			success:function(data)
			{
				console.log(data);
				if(data) {

					var questions = JSON.parse(data);

					for (var j=0; j < questions.length; ++j) {
					
					//console.log(questions[j]);

					fantasy_current_question++;

					$('#question' + j + '_fantasy_div').show();
					$('#question' + j + '_fantasy_question_text').attr("value", questions[j]['questiontext']);

					var type = questions[j]['type'];
					$('#question' + j + '_fantasy_question_type').prop("selectedIndex", type);

					if(type === 0) { // Regular test

						$('#question' + j + '_fantasy_type0').show();

						$('#question' + j + '_fantasy_answer_correct').attr("value", questions[j]['answer0']);
						$('#question' + j + '_fantasy_answer_incorrect0').attr("value", questions[j]['answer1']);
						$('#question' + j + '_fantasy_answer_incorrect1').attr("value", questions[j]['answer2']);
						$('#question' + j + '_fantasy_answer_incorrect2').attr("value", questions[j]['answer3']);

					} else if(type === 1) { // Multiple options

						$('#question' + j + '_fantasy_type1').show();
						$('#question' + j + '_fantasy_type0').hide();
						// Answers text
						$('#question' + j + '_fantasy_answer0').attr("value", questions[j]['answer0']);
						$('#question' + j + '_fantasy_answer1').attr("value", questions[j]['answer1']);
						$('#question' + j + '_fantasy_answer2').attr("value", questions[j]['answer2']);
						$('#question' + j + '_fantasy_answer3').attr("value", questions[j]['answer3']);
						// Checkboxes
						$('#question' + j + '_fantasy_answer0_check').prop("checked", !!+questions[j]['answer0_correct']);
						$('#question' + j + '_fantasy_answer1_check').prop("checked", !!+questions[j]['answer1_correct']);
						$('#question' + j + '_fantasy_answer2_check').prop("checked", !!+questions[j]['answer2_correct']);
						$('#question' + j + '_fantasy_answer3_check').prop("checked", !!+questions[j]['answer3_correct']);

					} else if(type === 2) { // Gapword

						$('#question' + j + '_fantasy_type2').show();
						$('#question' + j + '_fantasy_type0').hide();

						$('#question' + j + '_fantasy_gapword').attr("value", questions[j]['answer0']);

					} else if(type === 3) { // Essay
						$('#question' + j + '_fantasy_type3').show();
						$('#question' + j + '_fantasy_type0').hide();
					}
					}

				}
			}
			});

	}
	});

});







// Code handling the add AP button, up to a maximum of 10

var i = 0; // AP amount

$( "#create" ).click(function( ) {
  if(i != 10){
    var token_ap = Date.now().toString(); // Generating the AP token
    var PA = "<div class='punto-Activo ui-widget-content' ondblclick='openmodal(this," + token_ap + ")'></div>";
    $(PA).attr('id', token_ap).appendTo( "#area" ).draggable({containment: "parent"}).resizable({ghost: true, autoHide: true}).css({"background-color": "#C5D8FF","height":"50px", "width":"50px", "max-height": "400px", "max-height": "400px", "border": "1px solid black"});

    i++;
  } else{ // Shows the popup indicating that no more AP may be added
    x = window.location.href;
    window.location.href = "#popup1";
    window.location.replace = x;
  }
});

//modal background script

var modal = document.getElementById('modalBack');

var btn = document.getElementById("addBack");

var a = document.getElementById('closeA');

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

a.onclick = function(){
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var modalPA = document.getElementById('modalPA');
var ab = document.getElementById('ajaxSubmitAP');
var modalPA = document.getElementById('modalPA');
  ab.onclick = function(){
  modalPA.style.display = "none";
}
  ab.onclick = function(){
  modalPA.style.display = "none";
}

//$('#id_pa_modal').val(elemento.id);


// Each AP calls this function on double click, it opens its modal with its data if it already existed
function openmodal(elemento, tokenap){

    resetAPModal(); // Resets the modal to its default state, then show and assign the actual values received

    //var mod = document.getElementById('modalPA');
    var token_field = document.getElementById('_token_ap');
    var cptoken = tokenap; // Copy AP token to a local var
    token_field.setAttribute('value', cptoken); // Insert the AP token into the AP modal as hidden input

    // Ajax call to preload existing AP data into the modal, if it exists

    var form_data = new FormData();
    form_data.append('ap_token',cptoken);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    jQuery.ajax({
      url: "{{ url('/activepoint/modalFields') }}",
      method: 'post',
      contentType: false, // The content type used when sending data to the server.
      cache: false, // To unable request pages to be cached
      processData: false,
      data: form_data,
      success:function(data)
      {

	//console.log(data);

	if(data){ // FALTA ASGINAR EL TEXTO COMPLEMENTARIO, NO SE PUEDE TAN DIRECTAMENTE COMO LOS DEMAS

		if(data.title)
			$('#name_ap').prop("value",data.title);

		if(data.turn)
			$('#turn_ap').prop("selectedIndex",data.turn - 1);

		if(data.video)  // The BD only saves the actual video code, not the entire URL
			$('#video_ap').prop("value","https://www.youtube.com/watch?v=" + data.video);

		if(data.text)
			$('#text_ap').find('.ql-editor')[0].innerHTML = data.text;
	}

	// Ajax to get quiz data


	    $.ajaxSetup({
	      headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      }
	    });
	    jQuery.ajax({
	      url: "{{ url('/quiz/APModalFields') }}",
	      method: 'post',
	      contentType: false, // The content type used when sending data to the server.
	      cache: false, // To unable request pages to be cached
	      processData: false,
	      data: form_data, // The same FormData works, only the ap_token is needed
	      success:function(data)
	      {
		if(data){ // Show the correct fields with their respective values

			var questions = JSON.parse(data);

			for (var j=0; j < questions.length; ++j) {
				
				//console.log(questions[j]);

				ap_current_question++;

				$('#question' + j + '_ap_div').show();
				$('#question' + j + '_ap_question_text').prop("value", questions[j]['questiontext']);
				$('#question' + j + '_ap_question_score').prop("value", +questions[j]['score']);

				var type = questions[j]['type'];
				$('#question' + j + '_ap_question_type').prop("selectedIndex", type);

				if(type === 0) { // Regular test

					$('#question' + j + '_ap_type0').show();

					$('#question' + j + '_ap_answer_correct').prop("value", questions[j]['answer0']);
					$('#question' + j + '_ap_answer_incorrect0').prop("value", questions[j]['answer1']);
					$('#question' + j + '_ap_answer_incorrect1').prop("value", questions[j]['answer2']);
					$('#question' + j + '_ap_answer_incorrect2').prop("value", questions[j]['answer3']);

				} else if(type === 1) { // Multiple options

					$('#question' + j + '_ap_type1').show();
					$('#question' + j + '_ap_type0').hide();
					// Answers text
					$('#question' + j + '_ap_answer0').prop("value", questions[j]['answer0']);
					$('#question' + j + '_ap_answer1').prop("value", questions[j]['answer1']);
					$('#question' + j + '_ap_answer2').prop("value", questions[j]['answer2']);
					$('#question' + j + '_ap_answer3').prop("value", questions[j]['answer3']);
					// Checkboxes
					$('#question' + j + '_ap_answer0_check').prop("checked", !!+questions[j]['answer0_correct']);
					$('#question' + j + '_ap_answer1_check').prop("checked", !!+questions[j]['answer1_correct']);
					$('#question' + j + '_ap_answer2_check').prop("checked", !!+questions[j]['answer2_correct']);
					$('#question' + j + '_ap_answer3_check').prop("checked", !!+questions[j]['answer3_correct']);

				} else if(type === 2) { // Gapword

					$('#question' + j + '_ap_type2').show();
					$('#question' + j + '_ap_type0').hide();

					$('#question' + j + '_ap_gapword').prop("value", questions[j]['answer0']);

				} else if(type === 3) { // Essay
					// AP cannot have essay questions
				}
			}
		}
	      }
	     });


	// End of Ajax call

      }
     });
    // End of ajax call

    var mod = document.getElementById('modalPA');


    var bt = document.getElementById(elemento.id);

    var sp = document.getElementById("exit");

    mod.style.display = "block";

    sp.onclick = function() {
        mod.style.display = "none";
    }

    window.onlclick = function(event) {
        if (event.target == modal) {
        mod.style.display = "none";
        }
    }
}


function posicion(div) {
  var elemento = $(".midiv");
  var posicion = elemento.position();
  //alert( "left: " + posicion.left + ", top: " + posicion.top );
}

function submit(ruta){
  if( document.getElementById("imgBack").files.length == 0 ){
    var color = document.getElementById('color_value').value;
    document.getElementById('area').style.background = '#'+color;
  }
  else{
    $('#area').css('background', ruta);
  }
}

$( document ).ready(function() {
  btn.click();
});


// Ajax code to upload and save a fantasy, executes when clicking the fantasy Save button

jQuery(document).ready(function(){
  jQuery('#ajaxSubmit').click(function(e){
    e.preventDefault();
    var name = $('#name').val();
    var token = $('#_token').val();
    var backgroundImage = $('#imgBack').prop('files')[0];
    var backgroundColor = $('#color_value').val();
    var mainImage = $('#mainImg').prop('files')[0];
    var description = $('.ql-editor').html();

    var form_data = new FormData();

    form_data.append('name',name);
    form_data.append('token',token);
    form_data.append('backgroundImage',backgroundImage);
    form_data.append('mainImage', mainImage);
    form_data.append('backgroundColor', backgroundColor);
    form_data.append('description', description);
    form_data.append('action','edit');

    for (var pair of form_data.entries()) {
      console.log(pair[0]+ ', ' + pair[1]);
    }
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    jQuery.ajax({
      url: "{{ url('/fantasy/create') }}",
      method: 'post',
      contentType: false, // The content type used when sending data to the server.
      cache: false, // To unable request pages to be cached
      processData: false,
      data: form_data,
      success:function(data)
      {
        if(data.backgroundImage)
        {
          $('#area').attr('style','');
          $('#area').css('background', "url('"+data.backgroundImage+'?'+Math.random()  +"')");
        }
        if(data.backgroundColor){
          $('#area').attr('style','');
          $('#area').css('background', "#"+data.backgroundColor);
        }


		// Second ajax to send Fantasy quiz / question data
		// placed in the success function to avoid sending extra data if initial ajax fails
		if(fantasy_current_question > -1){

			var form_data_quiz = new FormData();

			var questions_array = [];
			//var images_array = [];

			for(var j=0; j<=fantasy_current_question; j++) {

				var question = {};

				var type = $('#question' + j + '_fantasy_question_type').val();
				question["type"] = type;
				question["question_text"] = $('#question' + j + '_fantasy_question_text').val();

				//images_array[j] = $('#question' + j + '_fantasy_question_image').prop('files')[0];
				var question_image = $('#question' + j + '_fantasy_question_image').prop('files')[0];
				if(question_image)
					form_data_quiz.append('image' + j, question_image);

				switch(type){
				case '0':
					question["answer_correct"] = $('#question' + j + '_fantasy_answer_correct').val();
					question["answer_incorrect0"] = $('#question' + j + '_fantasy_answer_incorrect0').val();
					question["answer_incorrect1"] = $('#question' + j + '_fantasy_answer_incorrect1').val();
					question["answer_incorrect2"] = $('#question' + j + '_fantasy_answer_incorrect2').val();
					break;
				case '1':
					question["answer0"] = $('#question' + j + '_fantasy_answer0').val();
					question["answer0_check"] = $('#question' + j + '_fantasy_answer0_check').prop('checked');
					question["answer1"] = $('#question' + j + '_fantasy_answer1').val();
					question["answer1_check"] = $('#question' + j + '_fantasy_answer1_check').prop('checked');
					question["answer2"] = $('#question' + j + '_fantasy_answer2').val();
					question["answer2_check"] = $('#question' + j + '_fantasy_answer2_check').prop('checked');
					question["answer3"] = $('#question' + j + '_fantasy_answer3').val();
					question["answer3_check"] = $('#question' + j + '_fantasy_answer3_check').prop('checked');
					break;
				case '2':
					question["gapword"] = $('#question' + j + '_fantasy_gapword').val();
					break;
				case '3': break; //Nothing to do currently with essay questions
				}

				questions_array[j] = question;
			}

			form_data_quiz.append('fantasy_token',token);
			form_data_quiz.append('questions',JSON.stringify(questions_array)); // converts the array to Json
			//form_data_quiz.append('images',images_array);


			/*for (var pair of form_data_quiz.entries()) {
				console.log(pair[0]+ ', ' + pair[1]);
    			}*/

			$.ajaxSetup({
			      headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      }
			    });
			    jQuery.ajax({
			      url: "{{ url('/quiz/fantasy') }}",
			      method: 'post',
			      contentType: false, // The content type used when sending data to the server.
			      cache: false, // To unable request pages to be cached
			      processData: false,
			      data: form_data_quiz
			      });
		} // End of fantasy quiz ajax

      }});
    });
  });




// active point ajax code, executed clicking an AP's Save button
  jQuery(document).ready(function(){
  jQuery('#ajaxSubmitAP').click(function(e){
    e.preventDefault();
    var token = $('#_token_ap').val();
    var turn = $('#turn_ap').val();
    var title = $('#name_ap').val();
    var text = $('.ql-editor').eq(1).html();
    var image = $('#image_ap').prop('files')[0];
    var audio = $('#audio_ap').prop('files')[0];
    var video = $('#video_ap').val();
    //var music = $('#music_ap').prop('files')[0];
    var coordinateX = $('#'+token).css('left');
    var coordinateY = $('#'+token).css('top');
    var height = $('#'+token).css('height');
    var width = $('#'+token).css('width');
    var status = null;    // Aclarar el tema de los estados
    var token_fantasy = $('#_token').val(); // coge token de la fantasia
    var html = $('#'+token).get(0).outerHTML;
    console.log(html);
    //alert(html);

    var form_data = new FormData();

    form_data.append('token',token);
    form_data.append('turn',turn);
    form_data.append('title',title);
    form_data.append('text',text);
    form_data.append('image', image);
    form_data.append('audio', audio);
    form_data.append('video', video);
    //form_data.append('music', music);
    form_data.append('coordinateX', coordinateX);
    form_data.append('coordinateY', coordinateY);
    form_data.append('height', height);
    form_data.append('width', width);
    form_data.append('status', status);
    form_data.append('html', html);
    // envia token de la fantasia para sacar el id en el controller
    form_data.append('token_fantasy',token_fantasy);


    for (var pair of form_data.entries()) {
      console.log(pair[0]+ ', ' + pair[1]);
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    jQuery.ajax({
      url: "{{ url('/activepoint/create') }}",
      method: 'post',
      contentType: false, // The content type used when sending data to the server.
      cache: false, // To unable request pages to be cached
      processData: false,
      data: form_data,
      success:function(data) {
            if(data.image){
              $('#' + token).css('background', "url('"+data.image+'?'+Math.random()  +"')");
            }

		// Second ajax to send AP quiz / question data
		// placed in the success function to avoid sending extra data if initial ajax fails
		if(ap_current_question > -1){

			var form_data_quiz = new FormData();

			var questions_array = [];

			for(var j=0; j<=ap_current_question; j++) {

				var question = {};

				var type = $('#question' + j + '_ap_question_type').val();
				question["type"] = type;
				question["question_text"] = $('#question' + j + '_ap_question_text').val();
				question["score"] = $('#question' + j + '_ap_question_score').val();

				switch(type){
				case '0':
					question["answer_correct"] = $('#question' + j + '_ap_answer_correct').val();
					question["answer_incorrect0"] = $('#question' + j + '_ap_answer_incorrect0').val();
					question["answer_incorrect1"] = $('#question' + j + '_ap_answer_incorrect1').val();
					question["answer_incorrect2"] = $('#question' + j + '_ap_answer_incorrect2').val();
					break;
				case '1':
					question["answer0"] = $('#question' + j + '_ap_answer0').val();
					question["answer0_check"] = $('#question' + j + '_ap_answer0_check').prop('checked');
					question["answer1"] = $('#question' + j + '_ap_answer1').val();
					question["answer1_check"] = $('#question' + j + '_ap_answer1_check').prop('checked');
					question["answer2"] = $('#question' + j + '_ap_answer2').val();
					question["answer2_check"] = $('#question' + j + '_ap_answer2_check').prop('checked');
					question["answer3"] = $('#question' + j + '_ap_answer3').val();
					question["answer3_check"] = $('#question' + j + '_ap_answer3_check').prop('checked');
					break;
				case '2':
					question["gapword"] = $('#question' + j + '_ap_gapword').val();
				}

				questions_array[j] = question;
			}

			form_data_quiz.append('ap_token',$('#_token_ap').val());
			form_data_quiz.append('questions',JSON.stringify(questions_array)); // converts the array to Json


			for (var pair of form_data_quiz.entries()) {
				console.log(pair[0]+ ', ' + pair[1]);
    			}

			$.ajaxSetup({
			      headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			      }
			    });
			    jQuery.ajax({
			      url: "{{ url('/quiz/activePoint') }}",
			      method: 'post',
			      contentType: false, // The content type used when sending data to the server.
			      cache: false, // To unable request pages to be cached
			      processData: false,
			      data: form_data_quiz
			      });
		} // End of active point quiz ajax

        }
      });
    });
  });

  //delete ap ajax, used to delete AP from the server when the user deletes it
  jQuery(document).ready(function(){
  jQuery('#ajaxDeleteAP').click(function(e){
    e.preventDefault();
    var token = $('#_token_ap').val();

    var form_data = new FormData();

    form_data.append('token',token);

    for (var pair of form_data.entries()) {
      console.log(pair[0]+ ', ' + pair[1]);
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    jQuery.ajax({
      url: "{{ url('/activepoint/delete') }}",
      method: 'post',
      contentType: false, // The content type used when sending data to the server.
      cache: false, // To unable request pages to be cached
      processData: false,
      data: form_data,
      success:function(data) { // If everything goes ok, delete the AP from the workspace and decrease the AP amount
            $('#' + data.token).remove();
      	    i--;
        }
      });
    });
  });



  //editor Fantasy
  hljs.configure({
    useBR: false,
    languages: ['javascript', 'ruby', 'python', 'html', 'c++', 'c', 'java', 'css']
  });


  var quill = new Quill('#editorFantasy', {
    modules: {
      toolbar: [
        [{ header: [5, 6, false] }],
        ['bold', 'italic', 'underline'],
        ['code-block', 'align', 'formula', 'list']
      ]
    },
    placeholder: 'Description...',
    syntax: true,
    theme: 'snow'
  });

  //editor Active Point

  hljs.configure({
      useBR: false,
      languages: ['javascript', 'ruby', 'python', 'html', 'c++', 'c', 'java', 'css']
    });


 var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['code-block'],

                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

                [ 'link', 'formula' ],        					  // add's image support
                          // dropdown with defaults from theme
                [{ 'align': [] }],

                ['clean']                                         // remove formatting button
            ];


    var quill2 = new Quill('#text_ap', {
      modules: {
        toolbar: toolbarOptions /*[
          [{ header: [5, 6, false] }],
          ['bold', 'italic', 'underline'],
          ['code-block','image', 'align', 'formula', 'list']
        ]*/
      },
      syntax: true,
      theme: 'snow'
    });


  //modal Main


  //jQuery time
  var current_fs, next_fs, previous_fs; //fieldsets
  var left, opacity, scale; //fieldset properties which we will animate
  var animating; //flag to prevent quick multi-click glitches

  $(".next").click(function(){
    if(animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
      step: function(now, mx) {
        //as the opacity of current_fs reduces to 0 - stored in "now"
        //1. scale current_fs down to 80%
        scale = 1 - (1 - now) * 0.2;
        //2. bring next_fs from the right(50%)
        left = (now * 50)+"%";
        //3. increase opacity of next_fs to 1 as it moves in
        opacity = 1 - now;
        current_fs.css({
          'transform': 'scale('+scale+')',
          'position': 'absolute'
        });
        next_fs.css({'left': left, 'opacity': opacity});
      },
      duration: 800,
      complete: function(){
        current_fs.hide();
        animating = false;
      },
      //this comes from the custom easing plugin
      easing: 'easeInOutBack'
    });
  });

  $(".previous").click(function(){
    if(animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
      step: function(now, mx) {
        //as the opacity of current_fs reduces to 0 - stored in "now"
        //1. scale previous_fs from 80% to 100%
        scale = 0.8 + (1 - now) * 0.2;
        //2. take current_fs to the right(50%) - from 0%
        left = ((1-now) * 50)+"%";
        //3. increase opacity of previous_fs to 1 as it moves in
        opacity = 1 - now;
        current_fs.css({'left': left});
        previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
      },
      duration: 800,
      complete: function(){
        current_fs.hide();
        animating = false;
      },
      //this comes from the custom easing plugin
      easing: 'easeInOutBack'
    });
  });

  $(".submit").click(function(){
    return false;
  })
</script>

@if($data['fantasy'])
<script>
$('#_token').val('{{$data['fantasy']->token}}');
$('#name').val('{{$data['fantasy']->name}}');
@if($data['fantasy']->description)
var html =  '{!!$data['fantasy']->description!!}';
quill.clipboard.dangerouslyPasteHTML(html);
@endif
@if($data['fantasy']->backgroundImage)
$('#area').css('background','url(../../{{$data['fantasy']->backgroundImage}})');
@endif
@if($data['fantasy']->backgroundColor)
$('#area').css('background','#{{$data['fantasy']->backgroundColor}}');
@endif

</script>
@endif

@foreach ($data['activepoints'] as $activepoint)
<script>
var token_ap = {{$activepoint->token}};
var PA = '{!!$activepoint->html!!}';
console.log(PA);
//data-toggle="modal" data-target="#displayModal";
$(PA).attr('id', token_ap).appendTo( "#area" ).draggable({containment: "parent"}).resizable();
</script>
@endforeach





@endsection
