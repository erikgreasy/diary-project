<?php 

require_once('./partials/header.php'); 

$file = 'inc/storage';


mk_file( $file );

$data = file_get_contents( $file );
$data = json_decode( $data ) ?: [];

// echo '<pre>';
// print_r( $data );
// echo '</pre>';


if( !empty( $_POST ) ) {
    



    $post = (object) [
        'note' => $_POST[ 'note-text' ],
        'time' => time()
    ];

    array_push( $data, $post );




    file_put_contents( $file, json_encode( $data ) );

}

?>

<div class="wrapper">

    <div class="landing">
        <div class="bg1 rellax" data-rellax-speed="-2"></div>
        <div class="bg2 rellax" data-rellax-speed="2"></div>
    
        <div class="text rellax" data-rellax-speed="7">
    
            <h1>The Diary</h1>
            <p>I solemnly welcome you to my head dear friend. Feel free to enter on your own responsibility</p>
            <a href="#" class="btn" id="enter">Enter</a>
        </div>
    </div>
    
    <div class="diary">
        <?php
        /**
         * Add form
         */

        if( can_edit() ) {

            include_once( './partials/addform.php' );
        }

        ?>

        <div class="note-list">
            <?php foreach( $data as $item ): ?>
                <div class="note">
                    <h5 class="date"><?php echo date( 'j M Y, G:i', $item->time ) ?></h5>
                    <p class="text"><?php echo nl2br( $item->note ) ?></p>
                </div>

            <?php endforeach ?>
        </div>
    </div>
</div>


<?php require_once('./partials/footer.php') ?>