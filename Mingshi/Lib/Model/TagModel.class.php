<?php
   class TagModel extends Model{
   
     public function mytag(){
	  $mytag =D('Usertags')->join('ms_tag on ms_usertags.tid = ms_tag.id')->where('ms_usertags.uid ='.$_GET['uid'])->field('ms_tag.name,ms_usertags.*')->select();
	  return $mytag;
	 }
               
   
   }


   












?>