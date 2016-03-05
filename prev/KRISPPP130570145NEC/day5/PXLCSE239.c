            /* Samhitha 's code */
#include <stdio.h>
#include <string.h>
#include <ctype.h>
main()
{
   char string[105],newstring[105],encryptedstring[150],swap;
   int length,strlength,i,k;
   printf("\nEnter the string which has a maximum of 105 characters:");
   scanf("%s",&string);
   strlength= strlen(string);
   printf("\nThe string entered is : %s",string);
   length=floor(sqrt(strlength));
   for(i=0;i<=strlength;i++)
   {
     newstring[i]=string[(strlength - (i))];
   }
   for(i=0;i<strlength;i++)
   {
       swap=newstring[i];
       newstring[i]=newstring[i+1];
       newstring[i+1]=swap;
   }
   k=0;
   strlength=strlen(newstring);
   for(i=0;i<=strlength;i++)
   {
     if(i%length)
     {
     encryptedstring[k]=newstring[i];
     k++;
     }
     else
     {
         encryptedstring[k]=' ';
         encryptedstring[k+1]=newstring[i];
         k++;
         k++;
     }
   }
   printf("\nThe final output is: %s",encryptedstring);
}
					