To run the project, type 
    >> npx vite  (run the frontend without laravel)
    >> npm run dev (run the laravel project - enable "hot" reload for CSS/JS) 
    >> php artisan serve (run the laravel + vite tgt + php backend)  >> then visit http://localhost:8000

To terminate the project
    >> ctrl + c     
    
To deploy the current testing server to public (CSS & JS)
    >> npx vite build

    1. After system deployed, u will see one "build" folder is created under "public" folder.  
    2. Then the compressed css and js script is created under "build". 
    3. Check if the live server is running the updated css/js, if not, delete the hot file then terminate project and run again. 


To push the progress to git
    1. Go Source Control 
    2. tick (stage) the file u want to push (click the + )
    3. click the more icon and click "push" or terminal >>  git push -u origin main