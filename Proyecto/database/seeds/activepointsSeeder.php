<?php

use Illuminate\Database\Seeder;

class activepointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('activepoints')->insert([
		  'id' => 666,
          'token'=>1,
          'turn'=>1,
          'title'=>'Yellow recycling container',
          'text'=>'For plastic',
          'image'=>'uploads/activepoints/images/1',
          'audio'=>'uploads/activepoints/audio/1',
          'height'=>'109px',
          'width'=>'195px',
          'status'=>'finalizado',
          'id_fantasy'=>666,
		  'html' => '<div class="punto-Activo ui-widget-content ui-draggable ui-draggable-handle ui-resizable ui-resizable-autohide" ondblclick="openmodal(this,1)" id="1" style="background: url(&quot;../../uploads/activepoints/images/1?0.00997195766784631&quot;) 0% 0% / 100% 100% no-repeat; border: none; top: 41px; left: 188px; height: 50px; width: 50px;"><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90; display: none;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90; display: none;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90; display: none;"></div></div>'

        ]);
        DB::table('activepoints')->insert([
         'id' => 2,
          'token'=>2,
          'turn'=>2,
          'title'=>'Yellow recycling container',
          'text'=>'For plastic',
          'image'=>'uploads/activepoints/images/2',
          'audio'=>'uploads/activepoints/audio/2',
          'height'=>'109px',
          'width'=>'195px',
          'status'=>'finalizado',
          'id_fantasy'=>666,
		  'html' => '<div class="punto-Activo ui-widget-content ui-draggable ui-draggable-handle ui-resizable ui-resizable-autohide" ondblclick="openmodal(this,1)" id="2" style="background: url(&quot;../../uploads/activepoints/images/1?0.00997195766784631&quot;) 0% 0% / 100% 100% no-repeat; border: none; top: 41px; left: 188px; height: 50px; width: 50px;"><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90; display: none;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90; display: none;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90; display: none;"></div></div>'
        ]);
        DB::table('activepoints')->insert([
          'id' => 3,
          'token'=>3,
          'turn'=>3,
          'title'=>'Yellow recycling container',
          'text'=>'For plastic',
          'image'=>'uploads/activepoints/images/3',
          'audio'=>'uploads/activepoints/audio/3',
          'height'=>'109px',
          'width'=>'195px',
          'status'=>'finalizado',
          'id_fantasy'=>666,
		  'html' => '<div class="punto-Activo ui-widget-content ui-draggable ui-draggable-handle ui-resizable ui-resizable-autohide" ondblclick="openmodal(this,3)" id="3" style="background: url(&quot;../../uploads/activepoints/images/3?0.00997195766784631&quot;) 0% 0% / 100% 100% no-repeat; border: none; top: 41px; left: 188px; height: 50px; width: 50px;"><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90; display: none;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90; display: none;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90; display: none;"></div></div>'
		  ]);

	}
}
