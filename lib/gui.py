import pygame
import data

class GuiObject(pygame.sprite.DirtySprite):

    def __init__(self,unit,size=(0,0),dirty=2):
        pygame.sprite.DirtySprite.__init__(self)
        self.image = pygame.surface.Surface(size)
        self.rect = pygame.rect.Rect((0, 0), (0, 0))

        self.unit = unit
        self.size = size
        self.rect = self.image.get_rect()

        self._valid = False
        self.dirty = dirty

    def invalidate(self):
        self._valid = False

    def get_size(self):
        return self.size

    def render(self):
        if not self.dirty == 2: self.dirty = 1
        self._valid = True

    def update(self):
        if not self._valid:
            self.render()

    def draw(self,surface):
        if self.dirty==0: return
        if self.dirty==1: self.dirty=0
        surface.blit(self.image,self.rect)

class MenuButton(GuiObject):

    def __init__(self,text,unit,size,dirty=1):

        GuiObject.__init__(self,unit,size,dirty)

        self.text = text
        self.status = 0

        self.text = text
        self.label = Label(self.unit,self.text,int(self.unit*2),(255,255,255),dirty=2)
        self.label.rect.centerx = self.rect.centerx
        self.label.rect.centery = self.rect.centery

        self.update()

    def set_status(self,status):
        if status==self.status: return
        self.status = status
        self.invalidate()

    def render(self):
        color = (5,113,10)
        if self.status == 1: color = (255,255,255)
        self.image.fill((0,0,0))
        border = int(self.unit / 3)
        pygame.draw.rect(self.image, color, (0,0, self.size[0], border), 0)
        pygame.draw.rect(self.image, color, (0,0, border, self.size[1]), 0)
        pygame.draw.rect(self.image, color, (self.size[0]-border,0, border, self.size[1]), 0)
        pygame.draw.rect(self.image, color, (0,self.size[1]-border, self.size[0], border), 0)
        self.label.draw(self.image)

        GuiObject.render(self)

    def update(self):
        GuiObject.update(self)

class Label(GuiObject):

    def __init__(self,unit,text,fontsize,fontcolor,dirty=1):

        size = (0,0)
        GuiObject.__init__(self,unit,size,dirty)

        self.text = text
        self.fontcolor = fontcolor
        self.set_fontsize(fontsize)

        self.update()

    def set_text(self,text):
        self.text = text
        self.invalidate()

    def set_fontcolor(self,fontcolor):
        self.fontcolor = fontcolor
        self.invalidate()

    def set_fontsize(self,fontsize):
        self.font = pygame.font.Font(data.filepath("font", "abel.ttf"), fontsize)
        self.fontsize = fontsize
        self.invalidate()
        self.render() #size updated

    def set_position(self,rect):
        self.rect = rect
        self.invalidate()

    def render(self):

        self.image = self.font.render(self.text, True, self.fontcolor)
        rect = self.rect
        self.rect = self.image.get_rect()
        self.rect.x = rect.x
        self.rect.y = rect.y

        GuiObject.render(self)

    def update(self):
        GuiObject.update(self)