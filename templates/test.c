#include <unistd.h>
#include <sys/mman.h>
#define MAX_LEN 10000
struct region {    
    int len;
    char buf[MAX_LEN];
};
struct region *rptr;
int fd;

fd = shm_open("/myregion", O_CREAT | O_RDWR, S_IRUSR | S_IWUSR);
if (fd == -1)
if (ftruncate(fd, sizeof(struct region)) == -1)
 rptr = mmap(NULL, sizeof(struct region),
       PROT_READ | PROT_WRITE, MAP_SHARED, fd, 0);
if (rptr == MAP_FAILED)
   