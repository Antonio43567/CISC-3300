// $.ajax({
//     url: 'http://localhost:3000/posts', // Assuming json-server runs on the default port 3000
//     type: 'GET',
//     success: function(response) {
//       console.log(response); // Logs the response from the server
//     },
//     error: function(error) {
//       console.log('Error:', error);
//     }
//   });

//   $.ajax({
//     url: 'http://localhost:3000/posts',
//     type: 'POST',
//     contentType: 'application/json',
//     data: JSON.stringify({
//       title: "New Post Title",
//       views: 150
//     }),
//     success: function(response) {
//       console.log(response); // Logs the response from the server
//     },
//     error: function(error) {
//       console.log('Error:', error);
//     }
//   });
  
//   $.ajax({
//     url: 'http://localhost:3000/posts/1', // Targeting post with ID 1
//     type: 'PUT',
//     contentType: 'application/json',
//     data: JSON.stringify({
//       id: "1", // It's important to restate the ID or use it in the URL
//       title: "Updated Title",
//       views: 300
//     }),
//     success: function(response) {
//       console.log(response); // Logs the updated resource
//     },
//     error: function(error) {
//       console.log('Error:', error);
//     }
//   });
$(document).ready(function() {
  // A. GET request to retrieve data from the "posts" resource
  $.ajax({
      url: 'http://localhost:3000/posts', // Adjust the port if your JSON server runs on a different one
      type: 'GET',
      success: function(data) {
          console.log('GET request to /posts:', data);
      }
  });

  // B. POST request to add a new "post" resource
  $.ajax({
      url: 'http://localhost:3000/posts',
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify({
          id: "3", // Assuming IDs are managed manually. If not, omit this for auto-generation
          title: "new title",
          views: 150
      }),
      success: function(data) {
          console.log('POST request to add a new /post:', data);
      }
  });

  // C. PUT request to replace the resource with id "1" in "posts"
  $.ajax({
      url: 'http://localhost:3000/posts/1',
      type: 'PUT',
      contentType: 'application/json',
      data: JSON.stringify({
          title: "updated title",
          views: 150
      }),
      success: function(data) {
          console.log('PUT request to update /posts/1:', data);
      }
  });
});
