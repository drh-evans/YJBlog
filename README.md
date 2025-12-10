# YJBlog - A football blog for football passionates.

Web Application created and submitted as coursework for CS-348 at Swansea University. Created by Rhys Evans (2316644@swansea.ac.uk).
YJBlog is a football themed blog allowing users to sign-up and discuss their favourite football topics.

## HOW TO RUN!

In order to run the web app you must run `sail up -d` in a terminal, you must ensure that Sail is installed and that Docker is open.

You MUST then run `sail npm run dev` in a seperate terminal to render the tailwindcss failure to do this will not run the css.

Once these have been run you may access the website via localhost on a brower, you must create an account to access all website features. In the event you accessed localhost prior to running `sail npm run dev` please re-open/refresh the web-page.

Livewire v3 must be installed for this web application to work, Mailpit is used for the mail system.

## Further Information

This application has been tested using the methods and packages described above. The most recent version has been tested and works using these methods.

Things I'd like to add in the future:
Live Broadcasting of events i.e. comments.
Live match results.
Friends/for you page.

Side notes:
The characters &#64 represent @ in html, as it clashes with livewire otherwise.
