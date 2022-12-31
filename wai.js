db.createUser( { user: "wai_web",
                pwd: "w@i_w3b",
                roles: ["readWrite", "dbAdmin" ] } )

db.getCollectionNames();
db.users.drop();
db.images.drop();
db.images.remove({ md5:"" });

db.createCollection("users", { clusteredIndex: { "key": { _id: 1 }, "unique": true, "name": "stocks clustered key" } } );
db.createCollection("images", { clusteredIndex: { "key": { _id: 1 }, "unique": true, "name": "stocks clustered key" } } );


db.users.insert([ { user: "pawel", password: "", description: "Paweł Pstrągowski" } ]);
db.images.insert([ { filename: "", user_id: "", date: ISODate("2022-12-31") } ]);

db.users.insert([ { _id: 1, user: "pawel", password: "", description: "Paweł Pstrągowski" } ]);