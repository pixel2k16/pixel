/*this program is written by manoj vaibhav in c++ language*/
#include<iostream.h>
#include<conio.h>
#include<string.h>
#include<stdlib.h>
#include<math.h>
void main()
{
clrscr();
char s[105];
cin>>s;
if(strlen(s)>105)
{
cout<<"the string lenght exceeding constraint limit!!\n";
exit(0);
}
int width,height;
width=floor(sqrt(strlen(s)));
height=ceil(sqrt(strlen(s)));
while(height*width<strlen(s))
{
width++;
}
char array[11][11];
int k=0;
for(int i=0;i<width;i++)
{
for(int j=0;j<height;j++)
{
array[i][j]=s[k];
k++;
}
}
int count=0;
for(i=0;i<height;i++)
{
for(int j=0;j<width;j++)
{
cout<<array[j][i];
count++;
if(count>strlen(s))
{
getch();
exit(0);
}
}
cout<<" ";
}
getch();
}
	