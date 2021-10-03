<!doctype html>
<html>
    <head>
        <title>How to add Custom Filter in DataTable with Postgresql - AJAX and PHP</title>
        <!-- Datatable CSS -->
        <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

        <!-- jQuery Library -->
        <script src="jquery-3.3.1.min.js"></script>
        
        <!-- Datatable JS -->
        <script src="DataTables/datatables.min.js"></script>

        <!-- Datatable CSS -->


        <link href='https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'> 
        <link href='https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'> 


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>


        
    </head>
    <body >

        <div >
            <!-- Custom Filter -->
            <table>
                <tr>
                    <td>
                        <input type='text' id='searchByName' placeholder='Enter name'>
                    </td>
                    <td>
                        <select id='searchByGender'>
                            <option value=''>-- Select Gender--</option>
                            <option value='male'>Male</option>
                            <option value='female'>Female</option>
                        </select>
                    </td>

                    <td>

                        <select id="searchByCity">                  
                        <option value=''>-- Select City--</option>
         			        <?php                                
                                  require_once "config.php";
               
                                  $sql = "SELECT DISTINCT city FROM employee ORDER BY city ASC";
                                  $result = pg_query($con, $sql);

                                  while ($value = pg_fetch_assoc($result)) {

               				     echo '<option value="'.$value["city"].'">'.$value["city"].'</option>';
										
               					   }
               			   ?>							
      
                </select>
    
                    </td>                    
                </tr>
            </table>
            
            <!-- Table -->
            <table id='empTable'  name="empTable" class='display dataTable'>
                <thead>
                <tr>
                    <th>id</th>                    
                    <th>Employee name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Salary</th>
                    <th>City</th>
                </tr>
                </thead>
                
            </table>
        </div>
        


<script>



</script>

<script>



</script>

        <!-- Script -->
        <script>

        $(document).ready(function(){

    var buttonCommon = {
        exportOptions: {
           columns: [ 0, 1, 2, 3, 4 ]
        }
    };



            var dataTable = $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                //'searching': false, // Remove default Search Control         


 
                'ajax': {
                    'url':'ajaxfile.php',
                    'data': function(data){
                        // Read values
                        var city = $('#searchByCity').val();
                        var gender = $('#searchByGender').val();
                        var name = $('#searchByName').val();

                        // Append to data
                        data.searchByCity = city;
                        data.searchByGender = gender;
                        data.searchByName = name;
                    }
                }       ,
                'columns': [
                    { data: 'id' },                
                    { data: 'emp_name' },
                    { data: 'email' },
                    { data: 'gender' },
                    { data: 'salary' },
                    { data: 'city' }

                ]

                ,
          dom: 'lBfrtip',
              

     "language": {
    "lengthMenu": "Display _MENU_ records"
  }

  ,

          


          buttons: [
                    'pageLength'
                    ,
                   {
                    // Impremir
                     extend: 'print',
                     exportOptions: {
                     columns: ':visible'
                        }
                    },
                    // Copiar solo cierta columnas con un metodo
                    $.extend( true, {}, buttonCommon, {
                    extend: 'copyHtml5'
                    } ),
                    $.extend( true, {}, buttonCommon, {
                    extend: 'pdfHtml5'
                    } ),
                    // Mostrar cierta columna
                    'colvis'
                    ],


        
        // Ocultar un columna 0
        columnDefs: [ {
            targets: 0,
            visible: false
        } ]                    

            });

            $('#searchByName').keyup(function(){
                dataTable.draw();
            });

            $('#searchByGender').change(function(){
                dataTable.draw();
            });

            $('#searchByCity').change(function(){
                dataTable.draw();
            });

        });
        </script>
    </body>

</html>
