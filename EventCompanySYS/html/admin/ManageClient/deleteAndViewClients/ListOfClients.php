<?php
require_once("../../../pdo-conn.php");
include ("../../../../additionalHtml/adminHeader.php");
   
    include "select.php";
    ?>
    <h1>List Of Clients</h1>
    <form class="search" action="ListOfClients.php" method="POST">
        <input id ="searchField" type="text" name="orgName" placeholder="Search Organization">
        <button id="searchbtn" type="submit">Search</button>
    </form>
        <?php
        if (count($clients) > 0) {
            ?>
            
            <table class = "list"> 
                    <thead>
                        <tr>
                            <th id ="top">ClientID</th>
                            <th id ="top">Organization name</th>
                            <th id ="top">Contact Name</th>
                            <th id ="top">Phone</th>
                            <th id ="top">Email</th>
                            <th id ="top">Address</th>
                            <th id ="top">Status</th>
                            <th id ="top">Action</th>
                        </tr>
                    </thead>
                <tbody>

            <?php

            
            foreach ($clients as $row) 
            { 
                ?>
            
                <tr>
                    <?php
                        echo 
                        "<td>" . $row['clientID']."</td>" .
                        "<td>" . $row['orgName']."</td>" .
                        "<td>" . $row['contactPerson'] . "</td>" .
                        "<td>" . $row['telephone'] . "</td>" .
                        "<td>" . $row['email'] . "</td>" .  
                        "<td>" . $row['building'] .", " .
                        $row['street'] . ", " .
                        $row['city'] . ", " .
                        $row ['county'] . ", " .
                        $row['eircode'] . "</td>".
                        "<td>".$row['status']."</td>";
                    ?>

                <td>
                    <div class="action">
                        <form action="../updateClient/updateClient.php" method ="post">
                        <input type="hidden">
                        <button type="submit" name="clientID" value="<?php echo $row['clientID']; ?>">
                            <img id="icon" src="../../../../img/icons/update.png">
                        </button>
                        </form>
                        <form method="post">
                            <input type="hidden" name="clientID" value="<?php echo $row['clientID']; ?>">
                            <button type="submit">
                                <img id ="icon" src="../../../../img/icons/binIcon.png">
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>

<?php 
include "deleteClient.php";
include ("../../../../additionalHtml/footer.html");

?>




