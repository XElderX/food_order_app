# Food Order App

## Backend part



### About Project

This is Exam task that i have been assigned to done as graduation at Baltic Institute of Technology. Developing this project I intend to show my skills as developer.  
Project have 2 parts: Backend - Server part as making API and handling server site operations I have chosen use Laravel framework. The for other part to implement front end part (User Interface, CRUD and authorisation) using front end technology - I have chosen to done with JavaScript library - React. 

<h5>Assignment summary</h5>
<p> Create food ordering from catering establishment WEB Application, App' purpoise to help users to order dish from exsisting menu of company.
</p> 

Task requirements:
* Create App using PHP programming language, applying  OOP (could be used PHP frameworks)
* App must rely on MVC architecture.
* App functionalities can be used only for registered users (some functionalities as creating restourant, menu, dishes only for with admin privilegies users)
* if user is not authentificated redirect to general page where can sign up or login.



### Built With

This app was developed with Laravel PHP framework for backend part. And Javescript library - React for front end part


## Getting Started

<li>There are instructions on setting up this project.</li>
<li>First, you have set up API so Laravel part have to be set up first</li>
<li>To get a local copy up and run the app follow these simple steps(more detailed in <b>Settin up the project</b>):</li>
<li>You have to clone the repository https://github.com/XElderX/food_order_app e.g On Visual Studio Code using git bash command line : <code> git clone https://github.com/XElderX/food_order_app.git </code> </li>
<img src="https://user-images.githubusercontent.com/99712528/177182283-f283b0d9-e3eb-4a50-8f06-d4dc0ac17d56.png" alt="gitHub Clone">
<li>Download Xampp and MySQL check below <b>Installation</b></li>

### Installation

* XAMPP's instaliation;

1. Go to "https://www.apachefriends.org/"
2. Download it and install it
3. On XAMPP's instalation location find dir with a name: htdocs
4. Put there content that you have cloned before.

* MySQL instaliation and and settin-up database;

1. Go to "https://dev.mysql.com/downloads/installer/"
2. Download it, then start <b> XAMPP control Panel</b>
3. On XAMPP's control panel start <code>Apache</code> and <code>MySQL</code> by pressing start;


### Settin up the project.
<ol>
<li>Once you have done steps above. Time to set up and run the API</li>
<li><b>If you do not have have composer yet</b>On bottom terminal container enter those command lines: composer instaliation download <code>php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"</code> enter, then validate installer by typing this command <code>php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"</code> and finnaly, this line <code> php composer-setup.php</code></li>
<img src="https://user-images.githubusercontent.com/99712528/177182300-e917e13a-08d3-4e3e-9a22-540692d16d0b.png" alt="Composer download">
<li><li>In terminal container enter command line to install required dependences: <code>composer update</code></li>
<li>Open <code> MySQL Workbench </code> Create MySQL Connection (if it's your first time) set username and password(by default just leave username as root and not set any password); <img src="https://user-images.githubusercontent.com/99712528/174490079-1d58c653-ad9d-4e5a-88f7-2f24aff64697.png" alt="newSQlConn">   </li>
<li>Press <code> Create a new SQL tab</code> and create new database<code>CREATE DATABASE restourant_review</code> and select it <code>use restourant_review;</code></li>
<li>go to project directory and open .env.example file. find line: <i>DB_DATABASE=laravel</i> change to <code>DB_DATABASE=food_order</code>  </li>
<li>make .env file by copying .env.example content with command line <code>cp .env.example .env</code></li>
<li>For next step you have to generate app key by firing command: <code>php artisan key:generate</code></li>
<li>Because this app have implemented JWT auth you have to generate into .env file secret key for token encyption.Simply type into command line <code>php artisan jwt:secret</code></li>
<li>run migrations and seeders by typing those command line<code>php artisan migrate</code> and <code>php artisan db:seed</code></li>
<li>run this API by typing<code>php artisan:serve<code></li>
<li>Congratulation you have sat up this project API</li>
<li>Now go to set up frontend part: https://github.com/XElderX/order-food-react </li>

</ol>






## Contact

<span><strong>Project developed by: </strong> Dalius Kriaučiūnas <a href="https://www.linkedin.com/in/dalius-kriauciunas/">Link to Linked In </a></span>
