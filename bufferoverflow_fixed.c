#include <stdio.h>
#include <string.h>
int main(void){
   char name[16];
   printf("Enter your name:");
   scanf("%15s",name);
   
     printf("Hello %s\n",name);
     return 0;

   }



/* #include <stdio.h>
#include <string.h>
int main(void){
   char name[16];
   printf("Enter your name:");
   fgets("%15s",name);
   
     printf("Hello %s\n",name);
     return 0;

   }
     */
