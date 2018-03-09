<?php
   #list($a,$b,$c) = array('a','b','c');
   #$str = 'one,two,three,four';
   #print_r(explode(',',$str,2));
   $github_signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
   list($hash_type,$hash_value) = explode('=',$github_signature,2);
   //获取用户 post传过来的 密钥
   $posts = file_get_contents("php://input");
   $secrets = 'NOpassword01!';
   $hash = hash_hmac($hash_type,$posts,$secrets);
   if($hash && $hash === $hash_value){
      echo '认证成功,开始更新';

      echo exec('sh auto_pull.sh');
      echo date('Y-m-d H:i:s');


   }
?>
