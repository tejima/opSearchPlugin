<?php use_javascript("http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js") ?>
<?php use_javascript("/opSearchPlugin/js/jquery.autocomplete.min.js") ?>
<?php use_stylesheet("/opSearchPlugin/css/jquery.autocomplete.css") ?>
  
<script type="text/javascript">
$(function(){
  $('#activity').autocomplete('searchajax/searchActivity');
});
</script>

アクティビティの検索<br>
<input type="text" size="50" name="activity" id="activity" />
<br>
<br>

