


<?php	
// Define as constantes globais e importa as dependências para fazer a validação do usuário através do script "blocker"
require dirname(__FILE__,2).'/assets/constants/dir.php';

require BASE.'/assets/sql/connection.php';
require BASE.'/assets/classes/UserClass.php';
require BASE.'/assets/scripts/blocker.php';	

blocker('http://localhost/admin/login', 'admin_users');

//---------------------------------------------------------------------------------------------------------------------

// Define a var 'redirect' da session para 'admin'. 
// Dessa forma a próxima vez que a requisição bater no index principal do site o usuário será redirecionado para a página de admin.
if(session_status() === PHP_SESSION_NONE) session_start();
$_SESSION['redirect'] = 'admin';


header('location: http://localhost/admin/usuarios');


exit;

?>




