db.createUser( { user: "wai_web",
                pwd: "w@i_w3b",
                roles: ["readWrite", "dbAdmin" ] } )

mongo --username=wai_web --password=w@i_w3b wai

db.getCollectionNames();
db.users.drop();
db.users.find();

db.images.drop();
db.images.remove({ md5:"" });
db.images.find();
db.images.findOne({ filename: "wp2164110.jpg" });
db.createCollection("users", { clusteredIndex: { "key": { _id: 1 }, "unique": true, "name": "stocks clustered key" } } );
db.createCollection("images", { clusteredIndex: { "key": { _id: 1 }, "unique": true, "name": "stocks clustered key" } } );
db.images.insert([ { filename: "", user_id: "", date: ISODate("2022-12-31") } ]);



db.users.insert([ { name: "pawel", password: "", email: "pawel@wp.pl" } ]);
db.users.insert([ { name: "michal", password: "", email: "michal@wp.pl" } ]);
db.images.insert([ { filename: "good-for-you-crab-1170x781.jpg", description: "krab 1", user: "pawel", author: "pawel" } ]);
db.images.insert([ { filename: "wp2164110.jpg", description: "krab 2", user: "michal", author: "monika" } ]);


