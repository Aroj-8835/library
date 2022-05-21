var JQ = jQuery.noConflict();
JQ(document).ready(function()
{
    JQ("#studentData").DataTable();
    JQ("#facultyData").DataTable();
    JQ("#booksData").DataTable();
    JQ("#viewData").DataTable();
   JQ(document).on("input","#search_book",function()
  {
    var search_text = JQ("#search_book").val();
    var student_id = JQ("#student_id").val();
    
    var param = {};
    param.search_text= search_text;
    param.student_id= student_id;
    JQ.post('get_books.php',param,function(res)
       {
         var obj = JSON.parse(res);
          JQ("#books_html").html(obj.html);
    
        });
    });

    JQ(document).on("click",".book_add",function()
     {
      var student_id = JQ("#student_id").val();
      var id_val = JQ(this).attr('id');
       var res = id_val.split("_");
        var book_id = res[res.length-1];
     
        var param = {};
         param.book_id= book_id;
         param.student_id= student_id;
         JQ.post('assign_books.php',param,function(res){
       var obj = JSON.parse(res);
       alert(obj.msg);
      window.location.href = 'view_assign_history.php?student_id='+student_id; 

     });
    });
     
     
  });    
        