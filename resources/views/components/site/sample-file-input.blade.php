@push('heading')
    <style>
        .card {
            border-radius: 5px;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
            width: 100%;
            height: 260px;
            background-color: #ffffff;
            padding: 20px;
        }

        .card h3 {
            font-size: 20px;
            font-weight: 600; 
        }

        .drop_box {
            margin: 10px 0;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border: 3px dotted #a3a3a3;
            border-radius: 5px;
        }

        .drop_box h4 {
            font-size: 16px;
            font-weight: 400;
            color: #2e2e2e;
        }

        .drop_box p {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 12px;
            color: #a3a3a3;
        }

        .upload-btn {
            text-decoration: none;
            background-color: #005af0;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            outline: none;
            transition: 0.3s;
        }

        .upload-btn:hover{
            text-decoration: none;
            background-color: #ffffff;
            color: #005af0;
            padding: 10px 20px;
            border: none;
            outline: 1px solid #010101;
        }
    </style>
@endpush

<div class="container-fluid px-0">
    <div class="card pt-3">
        <h3>Upload Your Content Sample File</h3>
        <input type="file" hidden accept=".doc,.docx,.pdf" class="file-upload" name="sample_file" id="fileID" style="display:none;">
        <div class="drop_box">
            <header>
                <h4>Select File here</h4>
            </header>
            <p>Files Supported: PDF, TEXT, DOC , DOCX</p>
            <a class="upload-btn btn">Choose File</a>
        </div>
    </div>
</div>

@push('script')
    <script>
        const dropArea = document.querySelector(".drop_box"),
            button = dropArea.querySelector(".upload-btn"),
            dragText = dropArea.querySelector("header"),
            input = document.querySelector(".file-upload");

        let file;
        var filename;

        button.onclick = () => {
            input.click();

        };

        input.addEventListener("change", function (e) {
            var fileName = e.target.files[0].name;
            let filedata = `
                <h4>${fileName}</h4>
                <label for="fileID" class="upload-btn btn mt-2">Change Another File</label>
            `
            dropArea.innerHTML = filedata;
        });
    </script>
@endpush