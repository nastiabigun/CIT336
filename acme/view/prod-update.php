<?php
//Build the categories option list
$catList = '<select name="categoryId" id="categoryId">';
$catList .= " <option>Select a Category</option>";

foreach ($categories as $category) {
 $catList .= "<option id='$category[categoryId]' value='$category[categoryId]'";
 if (isset($categoryId)) {
  if ($category['categoryId'] === $categoryId) {
   $catList .= ' selected ';
  }
 }
 elseif(isset($productInfo['categoryId'])){
    if($category['categoryId'] === $productInfo['categoryId']){
      $categoryList .= ' selected ';
    }
  }
 $catList .= ">$category[categoryName]</option>";
}
$catList .= '</select>';
?>
<!DOCTYPE html>
<html lang='en-us'>

 <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/head.php'; ?>

 <body>
  <div class="content">
   <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
   <?php echo $navList; ?>
   <main>

    <h1><?php if(isset($page_title)) {echo $page_title ;} ?></h1>

    <!-- message returned from the controller -->
    <?php
    if (isset($message)) {
     echo $message;
    }
    ?> 
    <p>* indicates a required field</p>

    <section class="productForm">
     <!--the data is sent to the products controller-->
     <form  method="post" action="/acme/products/index.php">

      <fieldset>
       <legend>Update Product</legend>

       <div class="input">
        Category: 
        <?php echo $catList; ?>
       </div>

       <div class="input">
        <label for="invName">Product Name:* </label>
        <input <?php if (isset($invName)) {
         echo "value='$invName'";
        } elseif (isset($productInfo['invName'])) {
         echo "value='$productInfo[invName]'";
        }
        ?>
         type="text" name="invName" id="invName" maxlength="50" required>
       </div>

       <div class="input">
        <label for="invDescription">Product Description:*</label>
        <textarea 
         name="invDescription" id="invDescription" maxlength="50" 
         placeholder="Enter description" required>
         <?php if (isset($invDescription)) {
          echo $invDescription;
         } elseif (isset($productInfo['invDescription'])) {
          echo $productInfo[invDescription];
         }
         ?>
        </textarea>
       </div>

       <div class="input">
        <label for="invImage">Product Image:* </label>
        <input 
        <?php if (isset($invImage)) {
         echo "value='$invImage'";
        } elseif (isset($productInfo['invImage'])) {
         echo "value='$productInfo[invImage]'";
        }
        ?>
         type="text" name="invImage" id="invImage" 
         value="/acme/images/products/no-image.png" required>       
       </div>

       <div class="input">
        <label for="invThumbnail">Product Thumbnail:*</label>
        <input <?php if (isset($invThumbnail)) {
         echo "value='$invThumbnail'";
        } elseif (isset($productInfo['invThumbnail'])) {
         echo "value='$productInfo[invThumbnail]'";
        }
        ?>
         type="text" name="invThumbnail" id="invThumbnail"
         value="/acme/images/products/no-image.png" required>
       </div>

       <div class="input">
        <label for="invPrice">Product Price:* </label>	
        <input <?php if (isset($invPrice)) {
         echo "value='$invPrice'";
        } elseif (isset($productInfo['invPrice'])) {
         echo "value='$productInfo[invPrice]'";
        }
        ?>
         type="number" name="invPrice" id="invPrice" min="0.01" step="0.05" 
         placeholder="Enter amount" required>
       </div>

       <div class="input">
        <label for="invStock">In Stock:*	</label>
        <input <?php if (isset($invStock)) {
         echo "value='$invStock'";
        } elseif (isset($productInfo['invStock'])) {
         echo "value='$productInfo[invStock]'";
        }
        ?>
         type="number" name="invStock" id="invStock" required>
       </div>

       <div class="input">
        <label for="invSize">Shipping Size:* </label>
        <input <?php if (isset($invSize)) {
         echo "value='$invSize'";
        } elseif (isset($productInfo['invSize'])) {
         echo "value='$productInfo[invSize]'";
        }
        ?>
         type="number" name="invSize" id="invSize" required>
       </div>

       <div class="input">
        <label for="invWeight">Weight (lbs):*  </label>
        <input <?php if (isset($invWeight)) {
         echo "value='$invWeight'";
        } elseif (isset($productInfo['invWeight'])) {
         echo "value='$productInfo[invWeight]'";
        }
        ?>
         type="number" name="invWeight" id="invWeight" required>
       </div>

       <div class="input">
        <label for="invLocation">Location:* </label>
        <input <?php if (isset($invLocation)) {
         echo "value='$invLocation'";
        } elseif (isset($productInfo['invLocation'])) {
         echo "value='$productInfo[invLocation]'";
        }
        ?>
         type="text" name="invLocation" id="invLocation" maxlength="35" required>
       </div>

       <div class="input">
        <label for="invVendor">Vendor Name:* </label>
        <input <?php if (isset($invVendor)) {
         echo "value='$invVendor'";
        } elseif (isset($productInfo['invVendor'])) {
         echo "value='$productInfo[invVendor]'";
        }
        ?>
         type="text" name="invVendor" id="invVendor" required>
       </div>

       <div class="input">
        <label for="invStyle">Primary Material:* </label>
        <input <?php if (isset($invStyle)) {
         echo "value='$invStyle'";
        } elseif (isset($productInfo['invStyle'])) {
         echo "value='$productInfo[invStyle]'";
        }
        ?>
         type="text" name="invStyle" id="invStyle" required>
       </div>

       <div class="button">
        <input type="submit" name="submit" value="Update Product" id="newProduct">        
       </div>

       <!-- Add the action name - value pair to process the new product name -->
       <input type="hidden" name="action" value="updateProduct">
       <input name="invId"
              type="hidden"
              value="<?php
        if (isset($productInfo['invId'])) {
         echo $productInfo['invId'];
        } elseif (isset($invId)) {
         echo $invId;
        }
        ?>">
      </fieldset>  

     </form>
    </section>
   </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
  </div> <!-- div content ends here -->
 </body>
</html>



