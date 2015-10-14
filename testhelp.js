var message_array = [];
        for (var i = 0; i < errors.length; i++) {
            var row = errors[i];
            var obj = {"text": row.message}
        
            message_array.push(obj)
        }
        
        return message_array;


// incoming data structure
var errors = [
    {
        "date": "14/10/2015",
        "heading": "Error heading1",
        "message": "Error message1"
    }
    ,
    {
        "date": "14/10/2015",
        "heading": "Error heading2",
        "message": "Error message2"
    }
]
 
// What I have tried:
// I want to create a similar object to 'error' but with a key of 'text'
// for it's values (using .message below but will concat. all of them together eventually).
var blah = {};
   for (var i = 0; i < errors.length; i++) {
       blah[i].text.push(errors[i].message)
   }
 
  // OR

var blah = {};
   for (var i = 0; i < errors.length; i++) {
       blah[i].text = errors[i].message
   }
