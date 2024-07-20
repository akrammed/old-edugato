<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>Upload Files</h1>
    <form id="upload-form" enctype="multipart/form-data">
        <input type="file" name="files" id="file-input" multiple required>
        <button type="submit">Upload</button>
    </form>
    <p id="response"></p>
    <hr>
    <h2>Files List by Category</h2>
    <button class="fetch-files-button" data-category="pictures">Fetch Pictures</button>
    <button class="fetch-files-button" data-category="videos">Fetch Videos</button>
    <button class="fetch-files-button" data-category="audio">Fetch Audio</button>
    <button class="fetch-files-button" data-category="other">Fetch Other</button>
    <div id="files-list"></div>

    <script>
        $(document).ready(function() {
            $('#upload-form').on('submit', function(event) {
                event.preventDefault();
                var files = $('#file-input')[0].files;
                var formData = new FormData();
                for (var i = 0; i < files.length; i++) {
                    formData.append('files', files[i]);
                }

                axios.post('http://127.0.0.1:8000/upload/', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    $('#response').text('Files uploaded: ' + response.data.filenames.join(', '));
                })
                .catch(function(error) {
                    $('#response').text('Failed to upload files.');
                    console.error('There was an error uploading the files!', error);
                });
            });

            $('.fetch-files-button').on('click', function() {
                var category = $(this).data('category');
                axios.get('http://127.0.0.1:8000/files/' + category)
                .then(function(response) {
                    var filesList = $('#files-list');
                    filesList.empty();
                    filesList.append('<h3>' + category + '</h3>');
                    var list = $('<ul></ul>');
                    response.data[category].forEach(function(file) {
                        var listItem = $('<li></li>').text(file);
                        var deleteButton = $('<button>Delete</button>').on('click', function() {
                            axios.delete('http://127.0.0.1:8000/files/' + category + '/' + file)
                            .then(function(response) {
                                listItem.remove();
                                alert(response.data.message);
                            })
                            .catch(function(error) {
                                alert('Failed to delete file.');
                                console.error('There was an error deleting the file!', error);
                            });
                        });
                        listItem.append(' ').append(deleteButton);
                        list.append(listItem);
                    });
                    filesList.append(list);
                })
                .catch(function(error) {
                    console.error('There was an error fetching the files!', error);
                });
            });
        });
    </script>
</body>
</html>
