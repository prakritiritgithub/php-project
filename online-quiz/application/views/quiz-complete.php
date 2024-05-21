<?php $this->load->view('include/header'); ?>
<!--<center> <img class="brand-logo" src="http://www.awsar-dst.in/intranet-portal/step-assets/images/quiz.jpg" alt="quiz" ></center>-->
<a style="position: absolute;left: 1240px;top: 40px;" href="<?php echo base_url(); ?>logout">Logout</a>

 <div id="printThis">
 <div class="container">
	                <center><h3>Congratulatios</h3></center>
                <br>
                <center><h5>You have successfully completed your quiz.</h5></center>
                <br>
				 
	  <table>
	  <tr><th>Question</th>
	  <th>Answer</th>
	  </tr>
			
              <tr>
                <td>Number of questions attempted</td>
                <td><?php echo count($result); ?></td>
               
              </tr>
              <tr>
                <td>Number of correct answer </td>
                <td><?php echo count($correct); ?></td>
               
              </tr>
            </table>
			
			<br>
			<br>
			
<center><input type="submit" value="Print" id="btnPrint" name="prnt" class="btn btn-primary"></center>
	
</div>
</div>

<?php /*
 <div id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content quiz">
            <!-- dialog body -->
            <div class="modal-body">
                <br>
                <center><h3>Congratulatios</h3></center>
                <br>
                <center><h5>You have successfully completed your quiz.</h5></center>
                <br>
             <table>
			 <?php if($result)
			 { 
		       foreach($result as $res){  ?>
             <tr>
			 <td><img src="uploads/<?php echo $res->question; ?>"></td>
			 <td><?php echo $res->answer; ?></td>
			 </tr>
			   <?php }
			 } ?>
              <!--<tr>
                <td>Number of questions attempted</td>
                <td><?php echo count($result); ?></td>
               
              </tr>
              <!--<tr>-->
              <!--  <td>Number of correct answer </td>-->
              <!--  <td><?php echo count($correct); ?></td>-->
               
              <!--</tr>-->
            </table>
                       
            </div>
            <!-- dialog buttons -->
            <div class="modal-footer"><input type="submit" class="btn btn-primary" value="OK"></div>
            
        </div>
    </div>
</div> */ ?>


<script>
  /*  $("#myModal2").modal({                    
        "backdrop"  : "static",
        "keyboard"  : true,
        "show"      : true          
    });
    */
</script>
<?php
//$this->load->view('include/footer');
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
  color: Red;
  font-size:20px;
 
}
@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}

</style>
<script>
document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
</script>