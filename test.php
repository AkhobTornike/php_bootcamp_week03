<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"
    />
</head>
<body class="bg-gray-50">
<?php 
  $servername = 'localhost';
  $username = 'baxicha';
  $password = 'toko777';
  $dbname = 'php_bootcamp_week03';
  $cocktail_name = $_POST['name'];
  $url = 'https://www.thecocktaildb.com/api/json/v1/1/search.php?s=';

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if($conn){
?>
<form action="/test.php" method="post" name="form">
  <div class="flex items-center justify-center min-h-screen">
      <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
          <div class="flex justify-center">
              <img src="/shaker.jpeg" class="w-20 h-20 text-blue-600" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path
                      d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
              </svg>
          </div>
          <h3 class="text-2xl font-bold text-center">Search Any Cocktail</h3>
          <!-- Cocktail Name -->
          <form action="">
              <div class="mt-4">
                  <div class="mt-4">
                      <label class="block">Cocktail Name<label>
                              <input type="text" name="name" placeholder="Cocktail"
                                  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                  </div>
                  <div class="flex items-baseline justify-between">
                      <button name="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Search</button>
                      <a href="#" class="text-sm text-blue-600 hover:underline">Look some</a>
                  </div>
              </div>
          </form>
      </div>
  </div>
</form>
<?php

$sql = "SELECT strName, strCategory, strGlass, strImage, strDate FROM cocktails ";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)) {
    if($row['strName'] == $cocktail_name) {
        $choosen_cocktail_name = $row['strName'];
        $choosen_cocktail_category = $row['strCategory'];
        $choosen_cocktail_glass = $row['strGlass'];
        $choosen_cocktail_image = $row['strImage'];
        $choosen_cocktail_date = $row['strDate'];

        $url_image = $choosen_cocktail_image;
        $name_iamge = $choosen_cocktail_name . '.png';

        file_put_contents('./image/' . $name_iamge, file_get_contents($url_image)); 
    ?>
        <div class="flex items-center min-h-screen bg-gray-50">

            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">

                <div class="flex flex-col md:flex-row">
            <!-- left side -->
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img
                        class="object-cover w-full h-full rounded-md"
                        src="/image/<?php print$name_iamge ?>"
                        alt="img"
                        />
                    </div>
            <!-- right side -->
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">INFO</h3><Br>

                            <label class="block text-sm"> NAME</label>
                            <div class="w-full bg-gray-200 rounded-full">
                                <div
                                class="
                                    w-40
                                    p-1
                                    text-lg
                                    font-medium
                                    leading-none
                                    text-center text-blue-100
                                    bg-blue-600
                                    rounded-full
                                    "
                                    >
                                <?php print $choosen_cocktail_name ?> 
                                </div>
                            </div>

                            <div class="mt-4 mb-4">
                                <label class="block text-sm"> CATEGORY </label>
                                <div class="w-full bg-gray-200 rounded-full">
                                    <div
                                    class="
                                        w-40
                                        p-1
                                        text-base
                                        font-medium
                                        leading-none
                                        text-center text-blue-100
                                        bg-blue-600
                                        rounded-full
                                        "
                                        >
                                    <?php print $choosen_cocktail_category ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block mb-2 text-sm"> GLASS </label>
                                <div class="w-full bg-gray-200 rounded-full">
                                    <div
                                    class="
                                        w-40
                                        p-1
                                        text-base
                                        font-medium
                                        leading-none
                                        text-center text-blue-100
                                        bg-blue-600
                                        rounded-full
                                        "
                                        >
                                    <?php print $choosen_cocktail_glass?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block mb-2 text-sm"> DATE </label>
                                <div class="w-full bg-gray-200 rounded-full">
                                    <div
                                    class="
                                    w-40
                                    p-1
                                    text-base
                                    font-medium
                                    leading-none
                                    text-center text-blue-100
                                    bg-blue-600
                                    rounded-full
                                    "
                                    >
                                    <?php print $choosen_cocktail_date ?>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <a
                                class="
                                        px-6
                                        py-2
                                        mt-4
                                        text-sm
                                        font-medium
                                        leading-5
                                        text-center text-white
                                        transition-colors
                                        duration-150
                                        bg-blue-600
                                        border border-transparent
                                        rounded-lg
                                        hover:bg-blue-700
                                        focus:outline-none
                                    "
                                    href="#"
                                    >
                                    Search New
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php 
        die();
    }
}

$sql = "SELECT strName, strCategory, strGlass, strImage, strDate FROM cocktails ";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)) {
    if($row['strName'] !== $cocktail_name) {
        $useragent = array(
            'http'=>array(
            'method'=>"GET", 'header'=>'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 
            (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36')
        );
        $context = stream_context_create($useragent);
    
        $cocktails_file = file_get_contents($url, false, $context);
        
        file_put_contents('cocktails.json', $cocktails_file);
        
        $json_cocktails = file_get_contents('cocktails.json');
        $json_cocktails_data = json_decode($json_cocktails, true);
    
        $strname = array_column($json_cocktails_data['drinks'], 'strDrink');
        $my_array[] = $strname;
        
        for ($i = 0; $i < 25; $i++) {
            if ($my_array[0][$i] == $cocktail_name) {
                $value_array_number = $i;
                $Str_Drink_Name = $json_cocktails_data['drinks'][$value_array_number]['strDrink'];
                $Str_Drink_Category = $json_cocktails_data['drinks'][$value_array_number]['strCategory'];
                $Str_Drink_Glass = $json_cocktails_data['drinks'][$value_array_number]['strGlass'];
                $Str_drink_Image = $json_cocktails_data['drinks'][$value_array_number]['strDrinkThumb'];
                $Str_Drink_Date = $json_cocktails_data['drinks'][$value_array_number]['dateModified'];
                
                $name_iamge = $Str_Drink_Name . '.png';
                $url_image = $Str_drink_Image;
    
                file_put_contents('./image/' . $name_iamge, file_get_contents($url_image));
    
                $sql = "INSERT INTO cocktails (strName, strCategory, strGlass, strImage, strDate)
                VALUES ('$Str_Drink_Name', '$Str_Drink_Category', '$Str_Drink_Glass', '$Str_drink_Image', '$Str_Drink_Date')";
                mysqli_query($conn,$sql);
                ?>
    
                <div class="flex items-center min-h-screen bg-gray-50">
    
                    <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
    
                        <div class="flex flex-col md:flex-row">
                        <!-- left side -->
                            <div class="h-32 md:h-auto md:w-1/2">
                                <img
                                class="object-cover w-full h-full rounded-md"
                                src="/image/<?php print$name_iamge ?>"
                                alt="img"
                                />
                            </div>
                    <!-- right side -->
                            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                                <div class="w-full">
                                    <h3 class="mb-4 text-xl font-bold text-blue-600">INFO</h3><Br>
    
                                    <label class="block text-sm"> NAME</label>
                                    <div class="w-full bg-gray-200 rounded-full">
                                        <div
                                        class="
                                            w-40
                                            p-1
                                            text-lg
                                            font-medium
                                            leading-none
                                            text-center text-blue-100
                                            bg-blue-600
                                            rounded-full
                                            "
                                            >
                                        <?php print $Str_Drink_Name ?> 
                                        </div>
                                    </div>
    
                                    <div class="mt-4 mb-4">
                                        <label class="block text-sm"> CATEGORY </label>
                                        <div class="w-full bg-gray-200 rounded-full">
                                            <div
                                            class="
                                                w-40
                                                p-1
                                                text-base
                                                font-medium
                                                leading-none
                                                text-center text-blue-100
                                                bg-blue-600
                                                rounded-full
                                                "
                                                >
                                            <?php print $Str_Drink_Category ?>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="mb-4">
                                        <label class="block mb-2 text-sm"> GLASS </label>
                                        <div class="w-full bg-gray-200 rounded-full">
                                            <div
                                            class="
                                                w-40
                                                p-1
                                                text-base
                                                font-medium
                                                leading-none
                                                text-center text-blue-100
                                                bg-blue-600
                                                rounded-full
                                                "
                                                >
                                            <?php print $Str_Drink_Glass?>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="mb-4">
                                        <label class="block mb-2 text-sm"> DATE </label>
                                        <div class="w-full bg-gray-200 rounded-full">
                                            <div
                                            class="
                                            w-40
                                            p-1
                                            text-base
                                            font-medium
                                            leading-none
                                            text-center text-blue-100
                                            bg-blue-600
                                            rounded-full
                                            "
                                            >
                                            <?php print $Str_Drink_Date ?>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="flex justify-end">
                                        <a
                                        class="
                                                px-6
                                                py-2
                                                mt-4
                                                text-sm
                                                font-medium
                                                leading-5
                                                text-center text-white
                                                transition-colors
                                                duration-150
                                                bg-blue-600
                                                border border-transparent
                                                rounded-lg
                                                hover:bg-blue-700
                                                focus:outline-none
                                            "
                                            href="#"
                                            >
                                            Search New
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    <?php 
                die();
            }
        }
    }
}
    ?>
<?php }?>
</body>
</html>