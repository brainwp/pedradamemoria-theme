<?php function essence_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li>
    	<?php $gravatar = get_avatar($comment->comment_author_email, 50);
			if($gravatar){ ?>
				<?php echo $gravatar; ?>
		<?php }else{ ?>
			<img src="http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=50">
		<?php }?>

		<div id="comment-<?php comment_ID(); ?>">

            <b><?php comment_author() ?></b>
            <time datetime="<?php echo comment_date('d/m/Y G:i:s') ?>" pubdate>
                em <?php echo get_comment_date('d/m/Y'); echo ' às '; echo get_comment_time('G:i:s'); ?>
            </time>

			<?php if ($comment->comment_approved == '0') : ?>
				<p><b>&lt; &lt; Seu comentário aguarda moderação &gt; &gt; </b></p>
			<?php endif; ?>

			<?php comment_text() ?>

			<?php //comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

		</div>
	</li>
<?php } ?>

<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Por favor, não carregue esta página diretamente.', THEME_NAME));

	if ( post_password_required() ) { ?>
		<span>Este post é protegido por senha. Entre com a senha para ver os comentários.</span>
	<?php
		return;
	}
?>

<?php if ( comments_open() ) : ?>       
    <p><?php cancel_comment_reply_link(); ?></p>
    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
    
        <p><b>Aviso!</b>Você precisa estar logado para comentar.</p>
          
        <form id="loginform" name="loginform" action="<?php echo url_site('wp-login.php', 'login_post') ?>" method="post">
            <?php do_action('login_form'); ?>
            <label for="usuario">Usuário</label>
            <input type="text" name="log" id="usuario" class="rounded" value=""/>
            <label for="senha">Senha</label>
            <input type="password" name="pwd" id="senha" class="rounded" value=""/>
            <input type="image" name="wp-submit" id="wp-submit" src="<?php url_tema('img/enviar.png')?>" />
            <input type="hidden" name="redirect_to" value="<?php the_permalink()?>" />
            <input type="hidden" name="testcookie" value="1" />
        <p>Não é cadastrado ainda? <a href="<?php echo site_url('wp-login.php?action=register'); ?>">Cadastre-se agora!</a></p>
        </form>
            
<?php else : ?>
        
        <?php if(is_user_logged_in()):
                global $current_user;
                get_currentuserinfo();
				$user_id = $current_user->ID;
				$nome = get_user_meta($user_id, 'nome', true);
                $gravatar = get_avatar($current_user->email, 50);
                if($gravatar){ ?>
                    <?php echo $gravatar; ?>
            	<?php }else{ ?>
                    <img src="http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=50">
        		<?php } 
		else:?>
            <img src="http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=50">
        <?php endif;?>
        
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="respond">
        
        <?php if ( is_user_logged_in() ) : ?>
            
            <p>Logado como
            <?php echo $nome; ?> 
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Deslogar desta conta">Deslogar desta conta &rarr;</a>
            <p>
            
        <?php else : ?>
            
            <label for="author">Nome *</label>
            <input type="text" class="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22">
            
            
            <label for="email">E-mail* (não será publicado)</label>
            <input type="text" class="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22">
            
            
        <?php endif; ?>
        
        <label for="comment">Comentário</label>
        <textarea name="comment" id="comment" tabindex="0" rows="5"></textarea>
        <input type="image" src="<?php url_tema('img/publicar-comentario.png')?>" />
        
        <?php comment_id_fields(); ?>            
    </form>
    
    <?php endif; ?>       
<?php endif; ?>

<?php if ( have_comments() ) : ?>

    <ul id="comments"><?php wp_list_comments('type=comment&callback=essence_comments'); ?></ul>

<?php else : ?>

	<?php if ( comments_open() ) : ?>
    
	<?php else : ?>

	<h2>Os comentários estão fechados para este post</h2>
    
	<?php endif; ?>

<?php endif; ?>