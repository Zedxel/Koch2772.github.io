    <div class="mysticfont">
            <h2>Simmilar products</h2>
    </div>
    <div class="main-page-content">
        <div class="categories">
            <div class="category-container">
                <ul class="category-list">
                <?php
                    
                    require_once "inc/dbconn.inc.php";
                    define("DB_HOST", "localhost");
                    define("DB_NAME", "mcp");
                    define("DB_USER", "dbadmin");
                    define("DB_PASS", "");

                    $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    $sql = "SELECT * FROM `product` WHERE `stockNum` LIKE '";
                    $sql .= $StockNum;
                    $sql .= "' ORDER BY `category` ASC";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                $row = mysqli_fetch_assoc($result);
                                $tmp = $row["category"]; 
	                    }
	                }
                    $sql = "SELECT * FROM `product` WHERE `category` LIKE '";
                    $sql .= $tmp;
                    $sql .= "' ORDER BY `category` ASC";
                    $extra = 0;

                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) < 5){
                            $extra = 4 - mysqli_num_rows($result);
						}
                        if(mysqli_num_rows($result) > 0){
                            $u=0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row["stockNum"] != $StockNum){
                                    echo    "<div class=\"category-product-1x4\">";
                                    echo        "<a href=\"#\">";
                                    echo            "<img src=\"productimages/";
                                    echo            $tmp = $row["stockNum"];
                                    echo            ".jpg\" alt=\"";
                                    echo            $row["stockNum"];
                                    echo            "\">";
                                    echo            "<h2>";
                                    echo            $row["productName"];
                                    echo            "</h2>";
                                    echo        "</a>";
                                    echo    "</div>";
                                    $u++;
                                }else{
                                    $extra++;                    
								}
                            }
	                    }
                    }

                    
                    
                    $sql = "SELECT * FROM `product` WHERE `stockNum` LIKE '%";
                    $sql .= substr($StockNum,0,4);
                    $sql .= "%'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row["stockNum"] != $StockNum){
                                    echo    "<div class=\"category-product-1x4\">";
                                    echo        "<a href=\"product-";
                                    echo        $row["stockNum"];
                                    echo        ".php\">";
                                    echo            "<img src=\"productimages/";
                                    echo            $tmp = $row["stockNum"];
                                    echo            ".jpg\" alt=\"";
                                    echo            $row["stockNum"];
                                    echo            "\">";
                                    echo            "<h2>";
                                    echo            $row["productName"];
                                    echo            "</h2>";
                                    echo        "</a>";
                                    echo    "</div>";
                                    $extra--;
                                }
                            }
	                    }
                    }
                    mysqli_close($conn);
                ?>
                </ul>
            </div>
        </div>
    </div>
