var express = require('express');
var socket = require('socket.io');
var sqlite3 = require('sqlite3').verbose();
var db = new sqlite3.Database(':memory:');
//App Setup

var app = express();

var clients = [];

db.serialize(function() {
    db.run("CREATE TABLE chat_users (socket_id TEXT, user_id TEXT , company_id TEXT )"); //CLIENT REGISTER
    db.run("CREATE TABLE users (socket_id TEXT, client_id TEXT , coatch_id TEXT )");
});

let http = require('http').Server(app);

//http.createServer(function (req, res) {
//  res.writeHead(200, {'Content-Type': 'text/plain'});
//  res.end('Hello World\n');
//}).listen(5200, 'localhost');

var server = http.listen(7000, function(req, res) {
    console.log("listen request port 7000");
});

// init table
// static file

// socket setup
var io = socket(server);

try {
    io.on('connection', function(socket) {
    //io.origins('*:*');

        io.set('origins', '*:*');
        //io.set('Access-Control-Allow-Credentials: true', '*:*');
        //io.set('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, HEAD, OPTIONS', '*:*');
        //io.set('Access-Control-Allow-Origin: *', '*:*');

    //io.set("Access-Control-Allow-Origin", "*");
    //io.set("Access-Control-Allow-Headers", "X-Requested-With");
    //io.set("Access-Control-Allow-Headers", "Content-Type");
    //io.set("Access-Control-Allow-Methods", "PUT, GET, POST, DELETE, OPTIONS");

        /************************************************************/
        /**********************  Harjinder  *************************/
        /************************************************************/


        socket.on('message', (message) => { console.log(message,'------------------- portal message'); });

        io.emit("newConnection", {
            socket_id: socket.id
        });

        socket.on("newConnection", data => {
            var stmt = db.prepare("INSERT INTO chat_users VALUES (? , ? , ?)");
            stmt.run(socket.id, data.user_id, data.company_id);

            stmt.finalize(); 

            db.each("SELECT * FROM chat_users WHERE socket_id = " + "\'" + socket.id + "\'", function(err, getuser) {
                console.log("............................Insert value Harjinder..................................");
                console.log(getuser);
                console.log("............................End Insert value Harjinder ..................................");
            })
        })


        // get users online

        socket.on("onlineUser", data => {   
        	 if(data.company_id == 'coatchId'){
                    db.each("SELECT * FROM chat_users WHERE user_id =" + "\'" + data.user_id + "\'",
                        function(err, coatch) {
                            if (!err) {                              
                                io.emit("onlineUser", coatch); // get all client have save coach id 
                                io.emit("tellIamOnline", coatch);
                            } else {
                                console.log(err);
                            }
                        });                     

            }else{
	            db.each("SELECT * FROM chat_users WHERE socket_id = " + "\'" + socket.id + "\'", function(err, getuser) {
	                    if (!err) {

	                            db.each("SELECT * FROM chat_users WHERE user_id = " + "\'" + getuser.user_id + "\'",
	                                function(err, getsender) {
	                                    if (!err) {
	                                        db.each("SELECT * FROM chat_users WHERE user_id =" + "\'" + getuser.user_id + "\'",
	                                            function(error, getclient) {
	                                                if (!err) {
	                                                    console.log("............................User value Harjinder..................................");
	                                                    console.log("user :- succ received online user");
	                                                    console.log(getclient);
	                                                    console.log("............................end user value Harjinder..................................");
	                                                    io.emit("onlineUser", getsender); // get all client have save coach id 
	                                                    io.emit("tellIamOnline", getsender);
	                                                    
	                                                    io.emit("getOnlineUser", { socket_id: socket.id,coatch_id:'portal', client_id: getsender.user_id });
	                                                    io.emit("telliamonline", { socket_id: socket.id,coatch_id:'portal', client_id: getsender.user_id });
	                                                } else {
	                                                    console.log(error);
	                                                }
	                                            })
	                                    } else {
	                                        console.log(err);
	                                    }
	                                })


	                    } else {
	                        console.log(err);
	                    }
	            });
           }   

        });

        /************************************************************/
        /*************************  END  ****************************/
        /************************************************************/

        //  connection
        console.log("new Connection " + socket.id);

        io.sockets.sockets[socket.id].emit("connectionConfirm", {
            socket_id: socket.id
        });
        socket.on("connectionConfirm", data => {

            var stmt = db.prepare("INSERT INTO users VALUES (? , ? , ?)");
            stmt.run(socket.id, data.sender_id, data.coatch_id);

            stmt.finalize();
            /************************* Harjinder ***********************/
            if(data.sender_id == data.coatch_id){
                
                var stmt_hb = db.prepare("INSERT INTO chat_users VALUES (? , ? , ?)");
                stmt_hb.run(socket.id, data.coatch_id, 'XYZ');

                stmt_hb.finalize();
                console.log("............................Insert value HB..................................");
                db.each("SELECT * FROM chat_users WHERE socket_id = " + "\'" + socket.id + "\'", function(err, getuser) {                
                    console.log(getuser);
                })
                console.log("............................End Insert value HB..................................");
            }
            /************************* Harjinder ***********************/

            db.each("SELECT * FROM users WHERE socket_id = " + "\'" + socket.id + "\'", function(err, getuser) {
                console.log("............................Insert value..................................");
                console.log(getuser);
                console.log("............................Insert value..................................");
            })
        })
        // get users online

        socket.on("getOnlineUser", data => {
            db.each("SELECT * FROM users WHERE socket_id = " + "\'" + socket.id + "\'", function(err, getuser) {
                if (!err) {
                    
                    if (getuser.client_id == getuser.coatch_id) {
                        /************************ harjinder ************************/
                        

                          db.each("SELECT * FROM chat_users",
                            function(error, getallusers) {
                                if (!error) {  
                                   var get_portal_clients =  {socket_id:getallusers.socket_id,coatch_id:'portal',client_id:getallusers.user_id };
                                   io.emit("getOnlineUser", get_portal_clients);
                                   io.emit("telliamonline", get_portal_clients);                      
                                } else {
                                    console.log(error);
                                }
                        })

                        db.each("SELECT * FROM users WHERE coatch_id =" + "\'" + getuser.coatch_id + "\'",
                            function(error, getcoatch) {
                                if (!error) {  
                                   var get_sender=  {socket_id:getcoatch.socket_id,user_id:getcoatch.coatch_id,company_id:'XYZ'};
                                   io.emit("onlineUser", get_sender);
                                   io.emit("tellIamOnline", get_sender);                      
                                } else {
                                    console.log(error);
                                }
                        })
                    /************************ harjinder ************************/
                        db.each("SELECT * FROM users WHERE client_id = " + "\'" + getuser.coatch_id + "\'",
                            function(err, getsender) {
                                if (!err) {
                                    db.each("SELECT * FROM users WHERE coatch_id =" + "\'" + getuser.coatch_id + "\'" + " AND client_id != " + "\'" + getuser.coatch_id + "\'",
                                        function(error, getclient) {
                                            if (!error) {
                                                io.sockets.sockets[socket.id].emit("getOnlineUser", getclient); // get all client have save coach id 
                                                io.sockets.sockets[getclient.socket_id].emit("telliamonline", getsender);
                                                
                                            } else {
                                                console.log(error);
                                            }
                                        })
                                } else {
                                    console.log(err);
                                }
                            })

                    } else {
                        db.each("SELECT * FROM users WHERE client_id = " + "\'" + getuser.client_id + "\'" + " AND coatch_id !=" + "\'" + getuser.client_id + "\'",
                            function(err, getsender) {
                                if (!err) {

                                    db.each("SELECT * FROM users WHERE client_id = " + "\'" + getuser.coatch_id + "\'", function(err, getcoach) {
                                        if (!err) {

                                            io.sockets.sockets[socket.id].emit("getOnlineUser", getcoach); // get coach according to client 1 client =  1 coach
                                            io.sockets.sockets[getcoach.socket_id].emit("telliamonline", getsender);
                                        } else {
                                            console.log(err)
                                        }
                                    })
                                }
                                console.log(err);

                            })

                    }
                } else {
                    console.log(err);
                }
            });
        });

         socket.on("sendMSG", data => {

            console.log(data,'-----------------------------------------data');
         	/************* Harjinder ****************/
         	try{
	            if(data.from == 'portal' && data.coach_socket_id!=''){
	            	io.sockets.sockets[data.coach_socket_id].emit("received", data);	            	
	            }

                db.each("SELECT * FROM chat_users WHERE user_id ="+ "\'" + data.receiverid + "\'",
                function(error, getclientportal) {
                    if (!error) {                       
                        //socket.broadcast.emit("message", data);
                        io.sockets.sockets[getclientportal.socket_id].emit("message", data);                        
                    } else {
                        console.log(error);
                    }
                });
                
            }catch(err){
            	console.log(err);
            }
            

           /************* Harjinder End ****************/
          
           db.each("SELECT * FROM users WHERE socket_id = " + "\'" + socket.id + "\'", function(err, getuser) {
                if (!err) {

                    if (getuser.client_id == getuser.coatch_id) {
                        db.each("SELECT * FROM users WHERE client_id = " + "\'" + getuser.coatch_id + "\'",
                        function(err, getsender) {
                            if (!err) {
                                db.each("SELECT * FROM users WHERE client_id ="+ "\'" + data.receiverid + "\'",
                                    function(error, getclient) {
                                        if (!err) {                                     

                                            io.sockets.sockets[getclient.socket_id].emit("received", data);   
                                                                              

                                        } else {
                                            console.log(err);
                                        }
                                    })
                            } else {
                                console.log(err);
                            }
                        })

                    } else {
                        db.each("SELECT * FROM users WHERE client_id = " + "\'" + getuser.client_id + "\'" + " AND coatch_id !=" + "\'" + getuser.client_id + "\'",
                        function(err, getsender) {
                            if (!err) {

                                db.each("SELECT * FROM users WHERE client_id = " + "\'" + getuser.coatch_id + "\'", function(err, getcoach) {
                                    if (!err) {

                                        io.sockets.sockets[getcoach.socket_id].emit("received", data);
                                    } else {
                                        console.log(err)
                                    }
                                })
                            }
                            console.log(err);
                        })
                    }
                } else {
                    console.log(err);
                }
            });
        })

        socket.on('disconnect', function() {            
            db.each("SELECT * FROM users WHERE socket_id = " + "\'" + socket.id + "\'", function(err, deleteuser) {
                db.run(`DELETE FROM users WHERE socket_id =?`, socket.id, function(err) {
                    if (err) {
                        console.error(err.message);
                    }
                    io.emit("disconnect", deleteuser);
                    //  console.log(`Row(s) deleted ${this.changes}`);
                });

                db.run(`DELETE FROM chat_users WHERE socket_id =?`, socket.id, function(err) {
                    if (err) {
                        console.error(err.message);
                    }
                    io.emit("disconnectUser", deleteuser);
                });

                console.log("delete succ ");
                console.log(deleteuser);
                db.each("SELECT * FROM users WHERE socket_id = " + "\'" + socket.id + "\'", function(err, deleteuser) {
                   
                })
            })

            /************************Harjinder********************/
            db.each("SELECT * FROM chat_users WHERE socket_id = " + "\'" + socket.id + "\'", function(err, deleteuser) {
                db.run(`DELETE FROM chat_users WHERE socket_id =?`, socket.id, function(err) {
                    if (err) {
                        console.error(err.message);
                    }
                    io.emit("disconnect", { socket_id: socket.id,coatch_id:'portal', client_id: deleteuser.user_id });
                    io.emit("disconnect", deleteuser);
                });

                console.log("delete succ ");
                console.log(deleteuser);
                db.each("SELECT * FROM chat_users WHERE socket_id = " + "\'" + socket.id + "\'", function(err, deleteuser) {
                   
                })
            })
            /*****************************************************/
        })
        //db.close();
    });
} catch (err) {
    console.log(err);
}

//  io.emit()  send to all                                   ->  io.to('room name).emit()   //send to room
//   socket.broadcast.emit()  do not send to current user    ->socket.broadcast.to('room').emit()
//    socket.emit()  emit specific user  
//  io.sockets.connected[socket.id].emit('chat',data); // private chat
//   io.sockets.sockets[data.handle].emit('chat',data);