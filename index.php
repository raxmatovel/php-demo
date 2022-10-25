<?
/*savol_12 3*/

if ($status=='savol_1') {
  $mtext = $message->getText();  

  if ($mtext=='⬅️ Ortga' OR $mtext=='Назад') {
      $rs['message'] = message::text('vipolneno',$tg);  
    $rs['keyboard'] = keyboard::main_menu('med_pred');  
    change_event_code('med_pred_main_menu',$cid);
    }else{

  //$rs['message'] = $tg['USER_ID'];


    $support_question = db::arr_s("SELECT * FROM support_question WHERE id_u='$tg[USER_ID]' AND status='draft'");

  if ($support_question=='empty') {

    $support_question = db::query("INSERT INTO support_question (
    id_u, 
    status
    )
    VALUES (
    '$tg[USER_ID]',
    'draft')");

    }

  $q[] = db::query("UPDATE support_question SET question_text = '$mtext' WHERE id_q ='$support_question[id_q]'");



  $rs['message'] = 'Яна савол колдиришингиз мумкин';
      change_event_code('savol_2',$cid); 
  }
}


/*savol_2*/
if ($status=='savol_2'){
  $mtext = $message->getText();  

  if ($mtext=='⬅️ Ortga' OR $mtext=='Назад'){
    $rs['message'] = message::text('vipolneno',$tg);  
    $rs['keyboard'] = keyboard::main_menu('med_pred');  
    change_event_code('med_pred_main_menu',$cid);
     } else {
      $q[] = db::query("INSERT INTO support_question  (id_u, question_text, status) VALUES ('$tg[USER_ID]', '$mtext', 'draft')");
     }

     $rs['message'] = 'Яна саволингиз болса бемалол колдиришингиз мумкин';
       change_event_code('savol_3',$cid); 
   

}

/*savol_3*/
if ($status=='savol_3'){
  $mtext = $message->getText();  

  if ($mtext=='⬅️ Ortga' OR $mtext=='Назад'){
    $rs['message'] = message::text('vipolneno',$tg);  
    $rs['keyboard'] = keyboard::main_menu('med_pred');  
    change_event_code('med_pred_main_menu',$cid);
     }
     else {
      $q[] = db::query("INSERT INTO support_question  (id_u, question_text, status) VALUES ('$tg[USER_ID]', '$mtext', 'draft')");
     }

     $rs['message'] = 'Яна борми? бемалол колдиришингиз мумкин';
       change_event_code('savol_4',$cid);
}

?>
