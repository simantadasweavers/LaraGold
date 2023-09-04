<!DOCTYPE html>
<html lang="en">
<title>Add Product</title>

<x-admin.cssfiles />

<script src="jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.4.1/tinycolor.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<style>
  .image-preview-container {
    width: 50%;
    margin: 0 auto;
    border: 1px solid rgba(0, 0, 0, 0.1);
    padding: 3rem;
    border-radius: 20px;
}

.image-preview-container img {
    width: 100%;
    display: none;
    margin-bottom: 30px;
}
.image-preview-container input {
    display: none;
}
.image-preview-container label {
    display: block;
    width: 45%;
    height: 45px;
    margin-left: 25%;
    text-align: center;
    background: #8338ec;
    color: #fff;
    font-size: 15px;
    text-transform: Uppercase;
    font-weight: 400;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

<body>
  <div class="container-scroller">
   
    <x-admin.navbar />
   
  
    <x-admin.sidebar />


      <div class="main-panel">
        <div class="content-wrapper">
         
         <div class="row">
            <div class="col-1"></div>
            <div class="col-10">

            <!-- add new product form -->
            <form action="{{url('/')}}/admin_addnewproduct_req" method="POST" enctype="multipart/form-data">
              
            @csrf

  <div class="mb-3">
    <label for="productName" class="form-label">Product's Name</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="productName" id="productName" placeholder="enter product's name"  aria-describedby="emailHelp" required>
  </div>

  <div class="mb-3">
    <label for="productCode" class="form-label">Product Code</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="productCode" id="productCode" placeholder="enter product's unique code(register basics)" aria-describedby="enter product unique code" required>
  </div>

  <div class="mb-3">
  <div class="image-preview-container">
    <div class="preview">
        <img id="preview-selected-image" />
    </div>
    <label for="file-upload">Upload Thumbnail Image</label>
    <input type="file" name="img" id="file-upload" accept="image/*" onchange="previewImage(event);" required />
  </div>
  </div>


  <div class="mb-3">
  <label for="parentCat" class="form-label">Parent Category</label><span style="color:red;">*</span>
  <select class="form-select" aria-label="Select parent category of product" name="parentCat" required >
  <option value="0" selected>Open Menu</option>
  @foreach($parent as $parent)
  <option value="{{$parent->parentid}}">{{$parent->parentname}}</option>
  @endforeach
  </select>

  <br>

  <!-- child category section -->
  <div class="mb-3">
    <label for="childCat" class="form-label">Child Category</label><span style="color:red;">*</span>
    <select class="form-select" name="childCat" aria-label="select product's child category" required>
    <option value="0" selected>open menu</option>
    @foreach($cat as $cat)
   <option value="{{$cat->catid}}">{{$cat->catname}}</option>
  @endforeach
</select>
  </div>

  <!-- product's size -->
  <div class="mb-3">
    <label for="productSize">Product's Size</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="productSize" placeholder="enter product's size(grams)" aria-lebel="select product's size" required>
  </div>

  <!-- product weight -->
  <div class="mb-3">
    <label for="productWeight" class="form-label">Product Weight</label><span style="color:red;">*</span>
    <input type="text" class="form-control" placeholder="enter product's weight" id="productWeight" name="productWeight" required>
  </div>

  <br>

  <!-- purity -->
  <div class="mb-3">
    <label for="purity">Purity</label><span style="color:red;">*</span>
    <select class="form-select" name="purity" aria-label="Select product's purity" required>
  <option value="">Open Menu</option>
  <option value="10k">10 Karat</option>
  <option value="14k">14 Karat</option>
  <option value="18k">18 Karat</option>
  <option value="22k">22 Karat</option>
  <option value="24k">24 Karat</option>
</select>
  </div>



  <!-- brand section -->
  <div class="mb-3">
  <label for="brandName" class="form-label">Select Brand</label><span style="color:red;">*</span>
  <select class="form-select" name="brandName" aria-label="select product's brand" required>
  <option value="0" selected>Open menu</option>
  @foreach($brand as $bra)
  <option value="{{$bra->brandid}}">{{$bra->bname}}</option>
  @endforeach
</select>
  </div>



<!-- MRP price section -->
  <div class="mb-3">
  <label for="price" class="form-label">Price (M.R.P)</label><span style="color:red;">*</span>
  <input type="text" class="form-control" name="price" id="price" placeholder="Enter your product's price(M.R.P)" required>
  </div>


  <!--  discounted price section -->
  <div class="mb-3">
  <label for="disprice" class="form-label">Discount Price</label>
  <input type="text" class="form-control" name="disprice" id="disprice" placeholder="Enter your product's discount price">
  </div>

  <!-- making charge -->
  <div class="mb-3">
    <label for="makingCharge" class="form-label">Making Charge</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="makingCharge" placeholder="enter product's making charge" required>
  </div>


  <div class="mb-3">
  <label for="gst" class="form-label">GST</label><span style="color:red;">*</span>
  <input type="text" class="form-control" name="gst" placeholder="enter gst price ex: 176 " required>
  </div>

 
  <div class="mb-3">
  <label for="shortdescription" class="form-label">Product's Description(short)</label><span style="color:red;">*</span> <br>
  <textarea name="shortdescription" placeholder="enter product's short description.." cols="100" rows="6" required></textarea>
  </div>

  
  <div class="mb-3">
  <label for="productDetail" class="form-label">Product's Details</label><span style="color:red;">*</span>
  <textarea name="productDetail" id="editor" cols="30" rows="10" required></textarea>
  <script>
CKEDITOR.replace('editor');
</script>
  </div>


  <!-- featured images -->
  <div class="mb-3">
  <p class="text-center fs-3">Product's Featured Images</p>
 <br>

  <div class="image-preview-container">
    <div class="preview">
        <img id="preview-selected-image2" />
    </div>
    <label for="file-upload2">Featured Image 1</label><span style="color:red;">*</span>
    <input type="file" name="img2" id="file-upload2" accept="image/*" onchange="previewImage2(event);" required />
</div>
  </div>

  <div class="mb-3">
  <div class="image-preview-container">
    <div class="preview">
        <img id="preview-selected-image3" />
    </div>
    <label for="file-upload3">Featured Image 2</label><span style="color:red;">*</span>
    <input type="file" name="img3" id="file-upload3" accept="image/*" onchange="previewImage3(event);" required />
</div>
  </div>

  <div class="mb-3">
  <div class="image-preview-container">
    <div class="preview">
        <img id="preview-selected-image4" />
    </div>
    <label for="file-upload4">Featured Image 3</label><span style="color:red;">*</span>
    <input type="file" name="img4" id="file-upload4" accept="image/*" onchange="previewImage4(event);" required />
</div>
  </div>


  <div class="mb-3">
  <label for="quantity" class="form-label">Quantity</label><span style="color:red;">*</span>
  <input type="text" class="form-control" name="quantity" placeholder="enter quantity" required>
  </div>

  <div class="mb-3">
  <label for="shipping" class="form-label">Shipping</label><span style="color:red;">*</span>
  <select class="form-select" id="shipping" aria-label="select what kind of shipping ?" required>
  <option value="1">free shipping</option>
  <option value="2">Ship Charge</option>
  </select>
  </div>

  <br>
  <div class="mb-3">
  <label for="shippingCost" id="label1">Shipping Charge</label>
  <input type="text" class="form-control" placeholder="enter product's cost" name="shippingCost" id="shippingCost">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

            </div>
            <div class="col-1"></div>
         </div>

        </div>
      </div>
      <!-- main-panel ends -->

      
    </div>
    <!-- page-body-wrapper ends -->
  </div>
   <x-admin.jsfiles /> 
</body>

<script>
  $(document).ready(function(){
    $('#shippingCost').hide();
    $('#label1').hide();

   $('#colorInput').blur(function(){
    let color = $('#colorInput').val();
   console.log(color); 
  });

  $('#shipping').change(function() {
    var val1 = $(this).val();

    console.log('shipping type: ' + val1);

    if(val1 == 1){
      $('#shippingCost').hide();
      $('#label1').hide();
    }
    else if(val1 == 2){
      $('#shippingCost').show();
      $('#label1').show();
    }
    
  });

  });
</script>

<!-- color input javascript -->
<script>
        const colorInput = document.getElementById('colorInput');
        const colorOptions = document.getElementById('colorOptions');

        // Generate and populate color options
        const colorNames = Object.keys(tinycolor.names);
        colorNames.forEach(colorName => {
            const option = document.createElement('option');
            // option.value = tinycolor(colorName).toHexString();
            option.text = colorName;
            colorOptions.appendChild(option);
        });
</script>


<!-- img script -->
<script>
  const previewImage = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image");
        imagePreviewElement.src = imageSrc;
        imagePreviewElement.style.display = "block";
    }
};
</script>

<!-- img2 script -->
<script>
  const previewImage2 = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image2");
        imagePreviewElement.src = imageSrc;
        imagePreviewElement.style.display = "block";
    }
};
</script>

<!-- img3 script -->
<script>
  const previewImage3 = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image3");
        imagePreviewElement.src = imageSrc;
        imagePreviewElement.style.display = "block";
    }
};
</script>

<!-- img4 script -->
<script>
  const previewImage4 = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image4");
        imagePreviewElement.src = imageSrc;
        imagePreviewElement.style.display = "block";
    }
};
</script>

</html>

