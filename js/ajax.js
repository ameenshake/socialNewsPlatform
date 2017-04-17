//calls itself over and over and over...and over...with no end in sight (im proud of this one)
let stuff = function() {
	let temp;

	$.ajax({
		url: "index.php?controller=posts&action=ajaxComments",

		data: $("#postID").serialize(),

		type: 'GET',

		success: function(data) {
			let jsondata = JSON.parse(data);

			//stores all the existing comment's commentIDs in array
			let existingComments = [];
			for (let k of $(".comment > input")) {
				existingComments.push(k.value);

			}




			//checks if commentId exists by comparing with existingComments array, otherwise adds it
			for (let i of jsondata) {
				if (!existingComments.includes(i.commentID)) {

					if (i.parentID == 0) {
						$(".commentarea").append(`<li class="comment" id="item${i.commentID}" >  ${i.commentText}
                                        <input type="hidden" name="commentID" value="${i.commentID}">
                                        <a id="reply${i.commentID}" class="reply" href="javascript:void(0);" >reply</a>
                                      </li>`);



					} else {


						if ($("#innerComment" + i.parentID).val() === undefined) {
							$("#reply" + i.parentID).after(`<ul id="innerComment${i.parentID}" class="innerComment">
                                               <li class="comment" id="item${i.commentID}" >  ${i.commentText}
                                                  <input type="hidden" name="commentID" value="${i.commentID}">
                                                  <a id="reply${i.commentID}" class="reply" href="javascript:void(0);" >reply</a>
                                               </li>
                                            </ul>`);
						} else {
              $("#innerComment" + i.parentID).append(`<li class="comment" id="item${i.commentID}" >  ${i.commentText}
                                                          <input type="hidden" name="commentID" value="${i.commentID}">
                                                          <a id="reply${i.commentID}" class="reply" href="javascript:void(0);" >reply</a>
                                                      </li>`);
						}

					}

          //adds eventListeners to each reply element
					$("#reply" + i.commentID).on("click", () => {
						$("#reply" + i.commentID).after(`<form method="post" action="index.php?controller=posts&action=createComment" >
                                                <input type="hidden" name="parentID" value="${i.commentID}">
                                                <input id="postID" type="hidden" name="postID" value="${i.postID}">
                                                <input type="submit" name="" value="Submit Comment">
                                                <textarea id="comment" name="comment"></textarea>
                                             </form>`);
					});
				}



			}




			window.setTimeout(stuff, 5000);
		}
	});
};
stuff();
