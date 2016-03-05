#include<stdio.h>
#include<string.h>
#include<math.h>
main()
{
    char a[105];
    int n,s,t,i,j,status[256];
    double st;
    for(i=0;i<256;i++)
        status[i]=0;
    scanf("%s",a);
    n=strlen(a);
    for(i=0;i<n;i++)
        status[a[i]]=1;
    st=sqrt(n);
    s=st;
    if(s==st)
        t=s;
    else
        t=s+1;
    char mat[s][t];
    for(i=0;i<n;i++)
        mat[i/t][i%t]=a[i];
        for(i=0;i<t;i++)
        {
            for(j=0;j<t;j++)
            {
                if(status[mat[j][i]])
                printf("%c",mat[j][i]);
            }
            printf(" ");
        }
}				