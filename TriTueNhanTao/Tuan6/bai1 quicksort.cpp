#include <iostream>
#include <fstream>
using namespace std;
void ReadFile(const char* path, int**& a, int& n)
{
	fstream file(path, ios::in);
	if (!file.is_open())
		cout << "File is not open" << endl;
	else
	{
		file >> n;
		a = new int* [n];
		for (int i = 0; i < n; i++)
		{
			a[i] = new int[2];
			for (int j = 0; j < 2; j++)
			{
				file >> a[i][j];
			}
		}
		file.close();
	}
}
void xuatmang(int** a, int n)
{
	for (int i = 0; i < n; i++)
	{
		for (int j = 0; j < 2; j++)
		{
			cout << a[i][j] << " ";
		}
		cout << endl;
	}
}
int partiton(int** a, int top, int bot)
{
	int x = a[top][0];
	int i = top + 1;
	int j = bot;
	do
	{
		while (i <= j && a[i][0] <= x)
			i++;
		while (i <= j && a[j][0] > x)
			j--;
		if(i < j)
		{
			swap(a[i][0], a[j][0]);
			swap(a[i][1], a[j][1]);
			i++;
			j--;
		}
	} while (i <= j);
	swap(a[top][0], a[j][0]);
	swap(a[top][1], a[j][1]);
	return j;
}
void quicksort(int** a, int top, int bot, int n)
{
	int k;
	if (top < bot)
	{
		k = partiton(a, top, bot);
		quicksort(a, top, k - 1, n);
		quicksort(a, k + 1, bot, n);
	}
	
}
void sort(int** a, int n)
{	
	quicksort(a, 0, n - 1, n);
}

void greedy1(int** a, int n)
{
	sort(a, n);
	int kq = 1;
	//cout << "Nhung doan thang co the chon la: (" << a[0][0] << ", " << a[0][1] << ")";
	int end = a[0][1];
	for (int i = 1; i < n; i++)
	{
		if (a[i][0] >= end)
		{
			end = a[i][1];
			//cout << ", (" << a[i][0] << ", " << a[i][1] << ")";
			kq++;
		}
	}
	cout << endl << "Vay ta chon duoc " << kq << " doan thang";
}

void main()
{
	const char* f_input = "line1.txt";
	int** a;
	int n;
	ReadFile(f_input, a, n);
	greedy1(a, n);
	for (int i = 0; i < n; i++)
	{
		delete[]a[i];
	}
	delete[]a;
}