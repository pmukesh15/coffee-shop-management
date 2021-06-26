"#coffeeshop" 

deployed in use the credential to login to admin panel

username : admin@coffeeshop.com
password : 123456789




http://coffeeshopbymukesh.herokuapp.com/public/




for local setup


clone the project




create your env file and give database credentials




run the commands



composer update



php artisan migrate



php artisan db:seed



then do php artisan serve or you can congigure to your localhost.



MODULE DESCRIPTION.

There will be 2 type of login in the same login interface.
admin credential already seeded with seeder please check the credentials above.

Customer can register through register link,

then he will be logged in to the home page.

The home page will load the approppriate data through apis.

Customer can request for order from there,
he can also view the previous orders and if the ordee is not confirmed by the admin,
there is a cancel option there if he changes his mind.
Two types of payment given cod and wallet.

A wallet also there in the home page which he can withdraw or recharge which will be handled through api.



The admin login.

using 

admin@coffeeshop.com

123456789


Admin can manage the order.

manage the customer and wallet.

manage the product

in the dashboard of admin we can see the counts and confirmed order table.

inside order menu which is in the side bar, admin can confirm or delete the order.


cancelling and deleting an already paid order will be refunded to customer wallet.


thank you


MUKESH P



7012664391






