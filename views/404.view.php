<?php
    require_once 'layouts/header.php';

    // $link_data = Link::find_link(['id' => $link->id]);
    // $data = Analytics::getData($link_data);

?>

<div style="margin:0 auto;padding:2% 20px;">
    <div id="analytics-box">
        <div id="analytics-header">
            <h2>Sorryyy... </h2>
        </div> 

        <div id="analytics-body" style="text-align: center;">
        <br><br>
          <h3>
          <i class="fa fa-warning"></i><br><br>
          The URL/Resource You Requested is Incorrect, Invalid or Doesn't Exist.<br><br>Please Try Again</h3>
        </div>

        <div id="analytics-footer">Contact Our Support Team or You can send your suggestions by sending a mail to support@pee.ng</div>
    </div>
</div>


<?php
    require_once 'layouts/footer.php';
?>