
"use strict";
const nodemailer = require("nodemailer");
var express = require("express");

var app = express();

app.get("/", function(req, res){
    res.send("Get methods");

});

app.post("/contact", (req, res) => {
    console.log("coming here contact post");
    res.sendStatus(200);
});

app.post("/subscribe", (req, res) => {
    console.log("coming here subscribe post");
    res.sendStatus(200);
});

app.get("/contact/**", (req, res) => {
    console.log("coming here contact get");
    console.log(req.query);
    res.sendStatus(200);
});

app.get("/subscribe", (req, res) => {
    console.log("coming here subscribe get");
    res.sendStatus(200);
});

app.get("/subscribe/**", (req, res) => {
    // console.log(req.params);
    // console.log(req.body);
    console.log(req.query);
    const email_id = req.query.EMAIL;
    console.log(email_id);
    main(email_id).catch(console.error);
    console.log("coming here get **");
    res.sendStatus(200);
});

app.post("/**", (req, res) => {
    console.log("coming here post **");
    res.sendStatus(200);
});

app.use(express.static("public")); // put the static data folder name here which contain your UI code.

var server = app.listen(process.env.PORT || 8081, function(){
    var host = server.address().address;
    var port = server.address().port;
    console.log(host +" : "+port);

});

// async..await is not allowed in global scope, must use a wrapper
async function main(to) {
    // Generate test SMTP service account from ethereal.email
    // Only needed if you don't have a real mail account for testing
    let testAccount = await nodemailer.createTestAccount();

    // create reusable transporter object using the default SMTP transport
    let transporter = nodemailer.createTransport({
        host: "smtp.gmail.com",
        port: 587,
        secure: false, // true for 465, false for other ports
        auth: {
            user: 'bizz.jyotirmays@gmail.com', // generated ethereal user
            pass: 'bizz@jms1.', // generated ethereal password
        },
    });

    // send mail with defined transport object
    let info = await transporter.sendMail({
        from: '"Jyotirmay S" <senapati.jyotirmay@gmail.com>', // sender address
        to: to, // list of receivers
        subject: "Hey, thanks for connecting with me.", // Subject line
        html: "<p>Hi, I am really glad to know that you show interest on my website. " +
            "Did you check my blogs, if not, please do have a look. " +
            "Hope you will like it.<br></p>" +
            "<span>Thanks and Regards,</span><br>" +
            "<strong>Jyotirmay S</strong>", // html body
    });

    console.log("Message sent: %s", info.messageId);
    // Message sent: <b658f8ca-6296-ccf4-8306-87d57a0b4321@example.com>

    // Preview only available when sending through an Ethereal account
    console.log("Preview URL: %s", nodemailer.getTestMessageUrl(info));
    // Preview URL: https://ethereal.email/message/WaQKMgKddxQDoou...
}

