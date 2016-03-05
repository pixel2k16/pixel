#include<iostream>
#include<stdio.h>
#include<string.h>
#include<stdlib.h>
#include<math.h>
using namespace std;
int main()
{
    char a[105];
    cin>>a;
    int r=floor(sqrt(strlen(a)));
    int c=ceil(sqrt(strlen(a)));

    while(r*c<strlen(a))
    {
        if(r+1>c && r+1>ceil(sqrt(strlen(a))))
        {
            c++;
        }
        else if(r+1<=ceil(sqrt(strlen(a))))
        {
            r++;
        }
    }

    char M[r][c];
    int k=0;
    for(int i=0;i<r;i++)
    {
        for(int j=0;j<c;j++)
        {
            if(k<strlen(a))
            {
            M[i][j]=a[k];
            k++;
            }
            else
            {
                M[i][j]='\0';
            }
        }
    }

    for(int j=0;j<c;j++)
    {
        for(int i=0;i<r;i++)
        {
            if(M[i][j]!='\0')
            cout<<M[i][j];
        }
        cout<<" ";
    }
}

								