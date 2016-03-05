#include <stdio.h>
#include <string.h>
#include <math.h>
#include <stdlib.h>
int main() 
{
    double f,c;
    int len,p=0,i,j,n;
    char *str=(char *)malloc(sizeof(char));
    char mat[12][12]={'\0'};
    scanf("%s",str);
    len=strlen(str);
    f=floor(sqrt(len));
    c=ceil(sqrt(len));
    for(i=f;i<=c;i++)
    {
        if(f*c<len)
            f++;
    }
    n=f*c;
    for(i=0;i<f;i++)
    {
        for(j=0;j<c && p<len;j++)
        {
            mat[i][j]=str[p];
            p++;
        }
    }

    for(j=0;j<c;j++)
    {
        for(i=0;i<f;i++)
        {
            if(mat[i][j]!='\0')
            printf("%c",mat[i][j]);
        }
        printf(" ");
    }
    return 0;
}