<?php 
/**
 * SnippWiki app
 * @subpackage: save-snippet
 * LICENSE: Apache
 * @author  Larry Judd & Tradesouthwest
 * @link    https://tradesouthwest.com
 */
include 'header.php';
if (!isset($_SESSION['user_session']))
{
echo '<a href="http://snippwiki.com/login.php" title="please login" class="btn btn-lg">Please Login If you are going to save a snippet</a>';
redirect('index.php');
}
?>

<div class="container-fluid">
    <div class="row">
    
    <nav class="col-md-2 sidebar">
        <?php include 'sidenav.php'; ?>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        
    <section class="form-horizontal">
    <?php
    if( isset( $_POST['submit_new'] ) ) 
    {
        $title    = clean_input($_POST['title']);
        $contents = clean_data($_POST['contents']);
        $anchor   = (!isset($_POST['anchor'])) ? 'OTHER' : clean_input($_POST['anchor']); 
        $excerpt  = clean_data(trim( substr($_POST["contents"], 0, 150)," " ));
        $date_in  = (empty( $_POST['date_in'] )) ? date('Y-m-d H:m:i') 
                    : clean_input($_POST['date_in']);
        $privi    = (!isset($_POST['privi'])) ? '' : clean_input($_POST['privi']);
        $stats    = (!isset($_POST['stats']) || '' == $_POST['stats']) ? 1 
                    : (int)($_POST['stats']);

        require_once ( SNIPP_BASE . 'db/dbh.php');
        $sql = "INSERT INTO tsw_snippets
            ( `title`, `anchor`, `contents`, `date_in`, `privi`, `stats`, `excerpt` ) 
            VALUES( :title, :anchor, :contents, :date_in, :privi, :stats, :excerpt )";
            $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':title',    $title);
        $stmt->bindValue(':anchor',   $anchor);
        $stmt->bindValue(':contents', $contents);
        $stmt->bindValue(':date_in',  $date_in);
        $stmt->bindValue(':privi',    $privi);
        $stmt->bindValue(':stats',    $stats);
        $stmt->bindValue(':excerpt',  $excerpt);
        $stmt->execute();

        if($stmt):
            $lastid = $dbh->lastInsertRowID();
        echo '<h4>Inserted snippet: ' . $title . '</h4>'; /*
        echo '<form id="viewsnippet" action="'. tsw_clean_url('view-snippet.php') .'" method="POST">
        <p><input type="hidden" name="tsw_nonce" value="'. $lastid .'">
        <button name="view_id" title="view" class="sendids btn btn-sm btn-default" 
            value="' . $lastid . '" onClick="document.getElementById(this.form).submit(.form);">
            view ' . $lastid . '</button></p>
        </form>'; */

        echo '<aside style="min-height: 280px">
            <p><a href="index.php" title="back home" class="btn">Back Home</a></p>
            <p>edited snippet ' . clean_input($title) . '</p>
            <p>id: ' . (int)$lastid . '</p>
            <p>on: ' . clean_input($date_in) . '</p>
            <p>as: ' . clean_input($anchor) . '</p>
            <form id="viewsnippet" method="POST" action="' . tsw_clean_url('view-snippet.php') .'">
            <p><button type="input" name="view_id" title="' . $title . '" 
              class="sendids btn btn-sm btn-default" value="' . (int)$lastid . '" 
              onClick="document.getElementById(this.form).submit(.form);">
              view ' . (int)$lastid . '</button></p>
            </form>  
            </aside>';
        ?> 
        <div class="btn-toolbar">
            <div class="btn-group-inline">
            <a href="index.php" title="return home" class="btn btn-sm btn-secondary">Back Home</a>
            <a href="account-page.php" title="return home" class="btn btn-sm btn-secondary">HQ</a>
            </div>   
        </div>
    <?php 
    else:
    echo '<h4>No content saved, please try again</h4><br>
    <p><a href="index.php" title="return home">return to home page</a></p>';
    endif;
    } $dbh = null; $dbh = '';
    ?>
    
    
    <?php 
    /**
     * for deleting if isset
     */
    if( isset( $_POST['deleting_snippet'] ) ) 
    {
        
        require_once ( SNIPP_BASE . 'db/dbh.php');

        $id = $_POST['delete_snippet'];

        if( is_numeric( $id ) ) {
            $sql = 'DELETE FROM tsw_snippets WHERE `id` = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

            $stmt->execute();
            
            if( $stmt ) { 
            echo '<h4>Successful Removal of Snippet <span>1 row with id: ' . $id .'</span></h4>
            <div class="btn-toolbar">
            <div class="btn-group-inline">
            <a href="index.php" title="return home" class="btn btn-sm btn-secondary">Back Home</a>
            <a href="account-page.php" title="return home" class="btn btn-sm btn-secondary">HQ</a>
            </div>';
            } else print('please try again');
        } 
        $dbh = ''; $id = '';    
    } ?>    

    </section>
    </main>
  </div>
</div>
    <?php include ( SNIPP_BASE . 'footer.php' ); ?>
  </body>
</html>