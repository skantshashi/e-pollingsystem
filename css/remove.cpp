
#include<bits/stdc++.h>
using namespace std;

int main()
{
   string str="silence is a source of great strength";
   
   set<char> s;
   int n=str.length();
   for(auto i=0;i<n;i++)
   {
       s.insert(str[i]);
   }
   for(auto x:s){
       cout<<x<<" ";
   }
   

    return 0;
}
