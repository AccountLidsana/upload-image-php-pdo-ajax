<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>

        <div class="container">
            <h1 class="text-center">ອັບໂຫລດຮູບ</h1>
            <form id="upload">
                <input type="text" name="name" id="name" placeholder="ຊື່" class="form-control">
                <input type="file" name="img" id="img" placeholder="ຮູບພາບ" class="form-control">
                <button type="submit" name="submit" id="submit" class="btn btn-success">upload</button>
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
        // ກຳນົດ3ໂຕນີ້ ຖ້າບໍ່ກຳນົດມັນຈະສົ່ງ type FILES  ບໍ່ໄດ້ ajax ສົ່ງໄດ້ສະເພາະ type POST

        // cache: false,
        // processData: false,
        // contentType: false,



        // ສົ່ງໄປໃຫ້ php ເຊັກ
        $(document).on("submit", "#upload", function(e) {
            e.preventDefault();
            var form = new FormData(this);

            form.append("img", $("#img").val());
            form.append("name", $("#name").val());

            $.ajax({
                url: "chk.php",
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: form,
                success: function(response) {
                    console.log(response);

                    var res = JSON.parse(response);
                    console.log(res);
                    if (res.status == 1) {
                        console.log(res.status, res.msg);
                    }
                }
            })
        })
        </script>
    </body>
</html>