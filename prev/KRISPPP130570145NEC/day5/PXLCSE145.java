#include<stdio.h>
#include<string.h>
#include<math.h>
int main()
{
    
    char st[105];
    scanf("%s",st);
    int j=(int)ceil(sqrt(strlen(st)));
    int i=(int)floor(sqrt(strlen(st)));
    //printf("\n%d\n%d\n\n",i,j);
    if(i*j<strlen(st)){
                       i++;
                       }
                       
    int k,q;
    char a[i][j];
    int p=0;
    for(k=0;k<i;k++)
    {
                    for(q=0;q<j;q++)
                    {
                                    a[k][q]=st[p];
                                    //printf("%c",a[k][q]);
                    p++;
                    }
    }
    
    for(k=0;k<j;k++)
    {
                    for(q=0;q<i;q++)
                    {
                                    printf("%c",a[q][k]);
                                    }
                                    printf(" ");
                                    }
                                    
                                    getch();
}
