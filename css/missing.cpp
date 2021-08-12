
#include<bits/stdc++.h>
using namespace std;

int main()
{
      int n;
   cin>>n;
   vector<int> arr(n),v1;
    for(int i=0;i<n;i++){
        int x;
        cin>>x;
        arr.push_back(x);
    }
    
    int start,end;
    cin>>start>>end;
    
    for(int i=start;i<=end;i++){
        
        if(binary_search(arr.begin(),arr.end(),i)==false){
            v1.push_back(i);
        }
    }
    
    for(int i=0;i<v1.size();i++){
        cout<<v1[i]<<" ";
    }
    return 0;
}
